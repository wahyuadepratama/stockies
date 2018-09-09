<?php

namespace App\Http\Controllers;

use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as Carts;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use \Cart as Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    public function index()
    {
      return view('guest.keranjang');
    }

    public function store(Request $request)
    {
      if($request->data == "0"){
        return back()->with('error','Silahkan Pilih Ukuran Foto');
      }else{
        $result = explode('|', $request->data);
      }

      $duplicates = Cart::search(function ($cartItem, $rowId) use ($request,$result) {
          if($cartItem->id === $request->id && $cartItem->options->path === $result[1]){
            return $cartItem->id === $request->id;
          }else{
            return null;
          }
      });

      if (!$duplicates->isEmpty()) {
          return back()->with('error','Foto dengan nama dan ukuran ini sudah ada dikeranjangmu!');
      }

      Cart::add($request->id, $request->nama, 1, $result[0],[
                  'path' => $result[1],
                  'src' => $result[2],
                  'ukuran' => $result[3],
                  'username' => $request->username,
                  'user' => $request->name
                ])->associate('App\Models\Photo');

      return back()->with('success','Foto berhasil ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('warning','Foto berhasil dikeluarkan dari keranjang!');
    }

    public function save(Request $request)
    {
      $this->validator($request->all())->validate();

      $subtotal = str_replace( ',', '', Cart::subtotal() );
      $unique = rand(100,399);
      $subtotal = $subtotal + $unique;

      $transaksi = Transaction::create([
        'id_user' => Auth::user()->id,
        'email' => $request->email,
        'total' => $subtotal,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      foreach (Cart::content() as $item){
        Carts::create([
          'id_photo' => $item->id,
          'id_transaksi' => $transaksi->id,
          'price' => $item->price,
          'ukuran' => $item->options->ukuran,
          'path' => $item->options->path,
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
      }

      Cart::destroy();

      return redirect('pembayaran/konfirmasi/'.$transaksi->id);

    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:191|confirmed'
        ]);
    }

    public function konfirmasi($id)
    {
      $transaksi =  Transaction::findOrFail($id);
      if($transaksi->id_user == Auth::user()->id){
        return view('guest.pembayaran-konfirmasi')->with('transaksi',$transaksi);
      }else{
        abort(404);
      }
    }

    public function uploadBukti(Request $request)
    {
      $this->validatorUpload($request->all())->validate();
      if( $request->hasFile('image') ){

        $conf     = \Config::get('sizeimage.buktiPembayaran');

        $file     = $request->file('image');
        $filename = Auth::user()->username.'_'.time() . '.' . $file->getClientOriginalExtension();
        $path     = 'storage/pembayaran/' . 'bukti_'.$filename;
        $resize   = Image::make($file)->resize($conf['x'], $conf['y'])->save($path);

        $id = Transaction::where('id_user',Auth::user()->id)->firstOrFail();

        $transaksi = Transaction::findOrFail($id->id);
        $transaksi->bank = 'bukti_'.$filename;
        $transaksi->status = "paid";
        $transaksi->save();

        return view('guest.pembayaran-selesai')->with('email',$id->email);

      }else{

        return back()->with('error','Pilih Foto Bukti Pembayaran!');

      }
    }

    public function validatorUpload(array $data)
    {
        return Validator::make($data, [
            'image' => 'required|mimes:jpeg,jpg,png|max:10240'
        ]);
    }

    public function selesai($id)
    {
      $transaksi =  Transaction::findOrFail($id);
      if($transaksi->id_user == Auth::user()->id){
        return view('guest.pembayaran-selesai')->with('email',$transaksi->email);
      }else{
        abort(404);
      }
    }
}
