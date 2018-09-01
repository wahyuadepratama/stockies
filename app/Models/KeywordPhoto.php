<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeywordPhoto extends Model
{
  protected $table = 'keywords_photos';
  
  protected $fillable = [
    'id_keyword', 'id_photo', 'created_at', 'updated_at'
  ];

  public function keyword(){
    return $this->belongsTo('App\Models\Keyword','id_keyword');
  }

  public function photo(){
    return $this->belongsTo('App\Models\Photo','id_photo');
  }
}
