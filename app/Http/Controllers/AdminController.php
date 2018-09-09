<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\Keyword;
use App\Models\Message;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('admin.dashboard');
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
        $photo = Photo::with('user')->where('active',0)->get();
        $publish = Photo::with('user')->where('active',1)->get();

        return view('admin.photo-management')
                ->with('category',$category)
                ->with('keyword',$keyword)
                ->with('user',$user)
                ->with('photo',$photo)
                ->with('publish',$publish);
    }

    public function approve($id)
    {
      $update = Photo::findOrFail($id);
      $update->active = 1;
      $update->save();
      return back()->with('success','Foto telah di publish!');
    }

    public function refuse($id)
    {
      $update = Photo::find($id);
      $update->active = 0;
      $update->save();
      return back()->with('success','Foto telah dibatalkan untuk di publish!');
    }

    public function photoDestroy($id)
    {
      $data = Photo::findOrFail($id);

      Storage::delete('photo/'.$data->thumbnail);
      Storage::delete('photo/'.$data->small);
      Storage::delete('photo/'.$data->medium);
      Storage::delete('photo/'.$data->large);
      Storage::delete('original_photo/'.$data->small_ori);
      Storage::delete('original_photo/'.$data->medium_ori);
      Storage::delete('original_photo/'.$data->large_ori);

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
      $data = Transaction::find($id);
      $data->status = "approved";
      $data->save();
      return back()->with('success','Transaksi telah di setujui!');
    }

    public function indexCart($id)
    {
      $data =  Cart::with('photo')->where('id_transaksi',$id)->get();      
      return view('admin.cart')->with('data',$data);
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
      return back()->with('succes','Komentar berhasil dihapus!');
    }

}
