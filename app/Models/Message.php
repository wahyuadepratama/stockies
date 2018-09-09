<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
    'body', 'sender', 'receiver', 'status' ,'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User','receiver');
  }

  public function senders(){
    return $this->belongsTo('App\Models\User','sender');
  }

}
