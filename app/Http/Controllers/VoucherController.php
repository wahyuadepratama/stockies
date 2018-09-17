<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Carbon\Carbon;
use \Cart as Cart;

class VoucherController extends Controller
{
    public function check(Request $request)
    {
      $voucher = Voucher::where('code',$request->voucher)->first();

      if($voucher == NULL){
        return back()->with('error','Kode Voucher yang Kamu Masukan Salah!');
      }else{
        foreach(Cart::content() as $item){
          $item->price = $item->price - (($voucher->percent_discount/100) * $item->price);
          Cart::update($item->rowId, ['price' => $item->price]);
          Cart::instance('backup')->update($item->rowId, ['price' => $item->price]);
        }
        Cart::instance('discount')->add('1','discount',1,1);

        return back()->with('success','Penggunaan Voucher Berhasil!');
      }

      return back()->with('error','Terjadi Kesalahan!');
    }
}
