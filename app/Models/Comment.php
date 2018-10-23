<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'body', 'id_user', 'id_photo', 'created_at', 'updated_at'
  ];

  public function photo(){
    return $this->belongsTo('App\Models\Photo','id_photo');
  }

  public function user(){
    return $this->belongsTo('App\Models\User','id_user');
  }
}
