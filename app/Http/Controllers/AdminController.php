<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\Posting;
use App\Models\Voucher;
use App\Models\Keyword;
use App\Models\Message;
use App\Mail\OrderPhoto;
use App\Models\Category;
use App\Models\ImagePosting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\CategoriPosting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
      $user = User::where('role_id',2)->count();
      $photos = Photo::all()->count();
      $photoPublished = Photo::where('active',1)->count();
      $photoWaiting = Photo::where('active',0)->count();
      $category = Category::all()->count();
      $keyword = Keyword::all()->count();
      $transactionApproved = Transaction::where('status','approved')->count();
      $transactionWaiting = Transaction::where('status','waiting')->count();
      $transactionPaid = Transaction::where('status','paid')->count();
      $totalTransaction = Transaction::count();
      $financialTransaction = Transaction::sum('total');
      $profitTransaction = User::where('id',Auth::user()->id)->first();


      return view('admin.dashboard')->with('user',$user)
                                    ->with('category',$category)
                                    ->with('keyword',$keyword)
                                    ->with('transactionApproved',$transactionApproved)
                                    ->with('transactionWaiting',$transactionWaiting)
                                    ->with('transactionPaid',$transactionPaid)
                                    ->with('totalTransaction',$totalTransaction)
                                    ->with('financialTransaction',$financialTransaction)
                                    ->with('profitTransaction',$profitTransaction->wallet)
                                    ->with('photo',$photos)
                                    ->with('photoWaiting',$photoWaiting)
                                    ->with('photoPublished',$photoPublished);
    }

    public function getAllUser(){
      $users = User::with('role')->where('role_id',2)->orderBy('name')->get();
      $deletedUsers = User::onlyTrashed()->get();

      return view('admin/user-management', ['users' => $users, 'deletedUsers'=>$deletedUsers]);
    }

    public function deleteUser($id){
      $user = User::find($id);
      $user->delete();
      return back()->with('success','You have successfully delete user');
    }

    public function restoreUser($id){
      $restore = User::withTrashed()->where('id',$id);
      $restore->restore();
      return back()->with('success','You have successfully restore user');
    }

    public function keywordKategori()
    {
      $one = Keyword::all();
      $two = Category::all();
      return view('admin.keyword-kategori')->with('keyword', $one)->with('kategori', $two);
    }

    public function keywordStore(Request $request)
    {
      $this->validate($request,[
        'nama'  => 'required|unique:keywords'
      ]);

      Keyword::create([
        'nama' => $request['nama']
      ]);

      return back()->with('success', 'Keyword Berhasil Ditambahkan!');
    }

    public function kategoriStore(Request $request)
    {
      Category::create([
        'nama' => $request['kategori']
      ]);

      return back()->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function keywordDestroy($id)
    {
      Keyword::find($id)->delete();
      return back()->with('success', 'Keyword Berhasil Dihapus');
    }

    public function kategoriDestroy($id)
    {
      Category::find($id)->delete();
      return back()->with('success', 'Kategori Berhasil Dihapus');
    }

    public function photoManagement()
    {
        $category = Category::all();
        $keyword = Keyword::all();
        $user = User::where('role_id',2)->get();
        $photo = Photo::with('user')->where('active',0)->orWhere('active',2)->get();
        $publish = Photo::with('user')->where('active',1)->get();

        return view('admin.photo-management')
                ->with('category',$category)
                ->with('keyword',$keyword)
                ->with('user',$user)
                ->with('photo',$photo)
                ->with('publish',$publish);
    }

    public function refusePhoto($id)
    {
      $update = Photo::find($id);
      $update->active = 2;
      $update->save();

      return back()->with('success','Foto telah dibatalkan untuk di publish!');
    }

    public function destroyPhoto(Request $request, $id)
    {
      $data = Photo::findOrFail($id);

      Storage::delete('photo/'.$data->thumbnail);
      Storage::delete('photo/'.$data->small);
      Storage::delete('photo/'.$data->medium);
      Storage::delete('photo/'.$data->large);
      Storage::delete('original_photo/'.$data->small_ori);
      Storage::delete('original_photo/'.$data->medium_ori);
      Storage::delete('original_photo/'.$data->large_ori);

      Message::create([
        'body' => "Foto kamu dengan judul <b>".$request->judul."</b> gagal di publish karena tidak sesuai dengan ketentuan kami.",
        'sender' => Auth::user()->id,
        'receiver' => $request->id_user,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      Photo::find($id)->delete();
      return back()->with('success', 'Foto Berhasil Dihapus');
    }

    public function indexTransaction()
    {
      $all = Transaction::join('carts','transactions.id','=','carts.id_transaksi')
                ->join('users','users.id','=','transactions.id_user')
                ->join('photos','photos.id','=','carts.id_photo')
                ->select('carts.*',
                        'transactions.*',
                        'users.*',
                        'photos.*',
                        'carts.id as id_carts',
                        'transactions.id as id_transaksi',
                        'users.id as id_user',
                        'photos.id as id_photo',
                        'transactions.created_at as waktu',
                        'transactions.email as penerima')
                ->groupBy('transactions.id')
                ->get();
      // return Transaction::with('cart')->get();

      return view('admin.transaction')->with('all',$all);
    }

    public function approveTransaction($id)
    {
      $transaksi = Transaction::find($id);
      $transaksi->status = "approved";
      $transaksi->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
      $transaksi->save();

      $conf = \Config::get('transaction');

      $cart = Cart::where('id_transaksi',$id)->get();
      $x = 0;
      foreach($cart as $isi){
        $userProfit = ($conf['user-profit']/100) * $isi->price;
        $adminProfit = ($conf['admin-profit']/100) * $isi->price;

        $data[$x] = Photo::with('user')->where('id',$isi->id_photo)->firstOrFail();
        $data[$x]->user->wallet = $data[$x]->user->wallet + $userProfit;
        $data[$x]->user->save();

        $dataAdmin = User::find(Auth::user()->id)->firstOrFail();
        $dataAdmin->wallet = $dataAdmin->wallet + $adminProfit;
        $dataAdmin->save();

        $x++;
      }

      Message::create([
        'body' => "Transaksi dengan nomor <b>#".$transaksi->id."</b> sudah kami setujui. Silahkan cek foto yang sudah dibeli pada email <b>".$transaksi->email."</b>. Terima kasih sudah membeli foto di Stockies ^_^",
        'sender' => Auth::user()->id,
        'receiver' => $transaksi->id_user,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('success','Transaksi telah di setujui! Pesan approve sudah dikirimkan ke user');
    }

    public function refuseTransaction($id)
    {
      $transaksi = Transaction::find($id);
      $transaksi->status = "paid";
      $transaksi->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
      $transaksi->save();

      $conf = \Config::get('transaction');

      $cart = Cart::where('id_transaksi',$id)->get();
      $x = 0;
      foreach($cart as $isi){
        $userProfit = ($conf['user-profit']/100) * $isi->price;
        $adminProfit = ($conf['admin-profit']/100) * $isi->price;

        $data[$x] = Photo::with('user')->where('id',$isi->id_photo)->firstOrFail();
        $data[$x]->user->wallet = $data[$x]->user->wallet - $userProfit;
        $data[$x]->user->save();

        $dataAdmin = User::find(Auth::user()->id)->firstOrFail();
        $dataAdmin->wallet = $dataAdmin->wallet - $adminProfit;
        $dataAdmin->save();

        $x++;
      }

      Message::create([
        'body' => "Maaf transaksi dengan nomor <b>#".$transaksi->id."</b> harus kami batalkan karena beberapa kesalahan, silahkan cek status pesanan kamu!",
        'sender' => Auth::user()->id,
        'receiver' => $transaksi->id_user,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('success','Transaksi telah di dibatalkan! Pesan pembatalan telah dikirim ke user');
    }

    public function rejectTransaction($id)
    {
      $transaksi = Transaction::find($id);
      $transaksi->status = "waiting";
      $transaksi->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
      $transaksi->save();

      Storage::delete('pembayaran/'.$transaksi->bank);

      Message::create([
        'body' => "Maaf transaksi dengan nomor <b>#".$transaksi->id."</b> harus kami tolak karena bukti pembayaran yang kamu kirimkan tidak sesuai dengan yang seharusnya, silahkan cek status pesanan kamu!",
        'sender' => Auth::user()->id,
        'receiver' => $transaksi->id_user,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('success','Transaksi telah ditolak! Pesan penolakan telah dikirim ke user');
    }

    public function deleteTransaction($id)
    {
      $transaksi = Transaction::find($id);

      Message::create([
        'body' => "Maaf transaksi dengan nomor <b>#".$transaksi->id."</b> harus kami hapus karena sudah melanggar aturan transaksi di Stockies. Silahkan lakukan transaksi ulang dikeranjang kamu!",
        'sender' => Auth::user()->id,
        'receiver' => $transaksi->id_user,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      $transaksi->delete();

      return back()->with('success','Transaksi telah dihapus! Pesan penghapusan sudah dikirim ke user');
    }

    public function indexCart($id)
    {
      $data =  Cart::with('photo')->where('id_transaksi',$id)->get();
      return view('admin.cart')->with('data',$data)->with('id_transaksi',$id);
    }

    public function indexMessage()
    {
      $user = User::all();
      return view('admin.message')->with('user',$user);
    }

    public function sendMessage(Request $request)
    {
      $this->validate($request,[
        'body'  => 'required',
        'user' => 'required'
      ]);

      if($request->user == 0){
        return back()->with('success','Tujuan belum diisi!');
      }

      Message::create([
        'body' => $request->body,
        'sender' => Auth::user()->id,
        'receiver' => $request->user,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);
      return back()->with('success','Pesan telah dikirim');
    }

    public function indexComments()
    {
      $all = Comment::with('user')->get();
      return view('admin.comment')->with('all',$all);
    }

    public function deleteComments($id)
    {
      $data = Comment::find($id);
      $data->delete();
      return back()->with('success','Komentar berhasil dihapus!');
    }

    public function indexVoucher()
    {
      $all = Voucher::all();
      return view('admin.voucher')->with('all',$all);
    }

    public function createVoucher(Request $request)
    {
      $this->validate($request,[
        'discount' => 'required',
        'code'  => 'required|unique:vouchers',
        'information' => 'required'
      ]);

      Voucher::create([
        'percent_discount' => $request->discount,
        'code' => $request->code,
        'information' => $request->information,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('success','Data Voucher Berhasil Ditambahkan!');
    }

    public function deleteVoucher($id)
    {
      $data = Voucher::find($id);
      $data->delete();
      return back()->with('success','Voucher berhasil dihapus!');
    }

    public function indexConfig()
    {
      return view('admin/config');
    }

    public function changeLanding(Request $request, $id)
    {
      $this->validate($request,[
        'image' => 'required|mimes:jpeg,jpg,png|max:10240'
      ]);

      if($id == 1){

        Storage::delete('landing/1.jpg');
        $path   = 'storage/landing/1.jpg';
        Image::make($request->image)->save($path);
        return back()->with('success','Berhasil mengubah landing page 1');

      }else if($id == 2){

        Storage::delete('landing/2.jpg');
        $path   = 'storage/landing/2.jpg';
        Image::make($request->image)->save($path);
        return back()->with('success','Berhasil mengubah landing page 2');

      }else if($id == 3){

        Storage::delete('landing/3.jpg');
        $path   = 'storage/landing/3.jpg';
        Image::make($request->image)->save($path);
        return back()->with('success','Berhasil mengubah landing page 3');

      }else{
        return back()->with('success','Terjadi Kesalahan!');
      }
    }

    public function sendMail($id)
    {
      $cart =  Cart::with('photo')->where('id_transaksi',$id)->get();
      $data = Transaction::find($id);

      Mail::to($data->email)->send(new OrderPhoto($cart));

      return redirect('admin/transaction')->with('success','Foto berhasil dikirim ke user, transaksi selesai!');
    }

    public function indexPosting()
    {
      $posting = Posting::with('user')->with('kategoriPosting')->get();
      return view('admin/posting')->with('posting',$posting);
    }

    public function createPosting()
    {
      $category = CategoriPosting::all();
      return view('admin/posting-create')->with('category', $category);
    }

    public function storePosting(Request $request)
    {
      $this->validate($request,[
        'judul' => 'required|unique:posting',
        'postingan'  => 'required'
      ]);

      if($request->foto){
        $slug   = str_slug($request->judul);
        $path   = 'storage/postingan/feature_'.$slug;
        Image::make($request->foto)->save($path);

        $request->foto = 'feature_'.$slug;
      }else{
        $request->foto = "no_image.png";
      }

      Posting::create([
        'judul' => $request->judul,
        'isi' => $request->postingan,
        'slug' => str_slug($request->judul),
        'foto' => $request->foto,
        'id_user' => Auth::user()->id,
        'id_kategori' => $request->category,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return redirect('admin/posting')->with('success','Postingan Baru Berhasil di Publish!');
    }

    public function updatePosting($id)
    {
      $posting = Posting::with('kategoriPosting')->find($id);
      $category = CategoriPosting::all();

      return view('admin/posting-update')->with('category',$category)->with('old',$posting);
    }

    public function storeUpdatePosting(Request $request, $id)
    {
      $this->validate($request,[
        'judul' => 'required',
        'postingan'  => 'required'
      ]);

      $data = Posting::find($id);

      if($request->foto){
        $slug   = str_slug($request->judul);
        $path   = 'storage/postingan/feature_'.$slug;
        Image::make($request->foto)->save($path);
        $request->foto = 'feature_'.$slug;
        $data->foto = $request->foto;
      }

      $data->judul = $request->judul;
      $data->isi = $request->postingan;
      $data->slug = str_slug($request->judul);
      $data->id_user = Auth::user()->id;
      $data->id_kategori = $request->category;
      $data->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
      $data->save();

      return redirect('admin/posting')->with('success','Postingan Berhasil di Update!');
    }

    public function destroyPosting($id)
    {
      $data = Posting::find($id);
      Storage::delete('postingan/'.$data->foto);
      Posting::destroy($id);
      return back()->with('success','Postingan Berhasil Dihapus!');
    }

    public function indexImagesPosting()
    {
      $data = ImagePosting::all();
      return view('admin/all-image-posting')->with('image', $data);
    }

    public function storeImagesPosting(Request $request)
    {
      if($request->foto){
        $path   = 'storage/postingan/images_'.now();
        Image::make($request->foto)->save($path);
        $request->foto = 'images_'.now();
      }else{
        return back()->with('success','Pilih Gambar Terlebih Dahulu!');
      }

      $path_url = url('/').'/'.$path;

      ImagePosting::create([
        'name' => $request->foto,
        'path' => $path_url,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('success','Upload Image Berhasil!');
    }

    public function destroyImagesPosting($id)
    {
      $data = ImagePosting::find($id);
      Storage::delete('postingan/'.$data->name);
      ImagePosting::destroy($id);
      return back()->with('success','Gambar Berhasil Dihapus!');
    }

}
