<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
  protected $fillable = [
    'nama', 'created_at', 'updated_at'
  ];

  public function keywordPhoto(){
    return $this->hasMany('App\Models\KeywordPhoto');
  }

}
