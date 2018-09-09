<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Closure;

class CheckPaid
{
  public function handle($request, Closure $next)
  {
    if(Auth::user()) {
      if(Auth::user()->role_id == 2){
        $check = Transaction::where('id_user', Auth::user()->id)->where('status','paid')->firstOrFail();
        if($check){
          return $next($request);
        }
      }
    }else {
        return abort(404);
    }
  }
}
