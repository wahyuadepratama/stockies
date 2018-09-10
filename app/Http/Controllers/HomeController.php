<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Message;
use App\Models\Status;
use App\Models\Photo;
use App\Models\User;
use App\Models\Cart;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      if(Auth::user()->role_id == 1){
        return redirect('stockies-admin');
      }else{
        $like    = Status::with('photo')->where('id_user',Auth::user()->id)->get();
        $waiting = Transaction::where('id_user',Auth::user()->id)->where('status','waiting')->orderBy('created_at', 'desc')->get();
        $paid    = Transaction::where('id_user',Auth::user()->id)->where('status','paid')->orderBy('created_at', 'desc')->get();
        $user    = Photo::where('id_user',Auth::user()->id)->where('active',1)->get();
        $active  = Photo::where('id_user',Auth::user()->id)->where('active',0)->get();
        $message = Message::with('senders')->where('receiver',Auth::user()->id)->where('status',0)->orderBy('created_at', 'desc')->get();

        if(isset($message))
          $notif = $message->count();
        else
          $notif = 0;

        $transaction  = Cart::join('transactions','transactions.id','=','carts.id_transaksi')
                                  ->join('photos','photos.id','=','carts.id_photo')
                                  ->select('photos.*')
                                  ->where('transactions.id_user','=',Auth::user()->id)
                                  ->where('transactions.status','=','approved')
                                  ->get();
        $confirmation  = Cart::join('transactions','transactions.id','=','carts.id_transaksi')
                                  ->join('photos','photos.id','=','carts.id_photo')
                                  ->select('photos.*')
                                  ->where('transactions.id_user','=',Auth::user()->id)
                                  ->where('transactions.status','=','waiting')
                                  ->orWhere('transactions.status','=','paid')
                                  ->get();

        return view('user.home')->with('likes', $like)
                                ->with('transaksi',$transaction)
                                ->with('konfirmasi',$confirmation)
                                ->with('waiting',$waiting)
                                ->with('paid',$paid)
                                ->with('message',$message)
                                ->with('notif',$notif)
                                ->with('yours',$user)
                                ->with('active',$active);
      }
    }

    public function showMessage($id)
    {
      $check = Message::with('senders')->where('receiver',Auth::user()->id)->where('status',0)->where('id',$id)->firstOrFail();
      return view('user.message-room')->with('message',$check);
    }

    public function deleteMessage($id)
    {
      $data = Message::find($id);
      $data->delete();
      return redirect('/home');
    }

}
