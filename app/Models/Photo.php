<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = [
    'nama', 'slug', 'thumbnail', 'small', 'medium', 'large', 'price_small', 'price_medium', 'price_large', 'id_category', 'id_user' , 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User','id_user');
  }

  public function category(){
    return $this->belongsTo('App\Models\Category','id_category');
  }

  public function keywordPhoto(){
    return $this->hasMany('App\Models\KeywordPhoto');
  }
}
