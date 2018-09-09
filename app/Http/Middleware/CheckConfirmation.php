<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class CheckConfirmation
{
    public function handle($request, Closure $next)
    {
      if(Auth::user()) {
        if(Auth::user()->role_id == 2){
          $check = Transaction::where('id_user',Auth::user()->id)->where('status','waiting')->firstOrFail();
          if($check){
            return $next($request);
          }
        }
      }else {
          return abort(404);
      }
    }
}
