<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:191',
            'email_confirmation'  => 'required|string|confirmed'
        ]);
    }
}
