<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'status';
  protected $fillable = [
    'likes', 'id_user', 'id_photo', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User', 'id_user');
  }

  public function photo(){
    return $this->belongsTo('App\Models\Photo', 'id_photo');
  }
}
