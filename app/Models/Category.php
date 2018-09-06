<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    'nama', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->hasMany('App\Models\Photo');
  }
}
