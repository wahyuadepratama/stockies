<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
    'id_user', 'status', 'email', 'bank', 'sender', 'total', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User','id_user');
  }

  public function cart(){
    return $this->hasMany('App\Models\Cart');
  }
}
