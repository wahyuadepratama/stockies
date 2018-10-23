<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
  protected $table = 'posting';
  protected $fillable = [
    'judul', 'isi', 'slug', 'foto', 'id_user', 'id_kategori', 'created_at', 'updated_at'
  ];

  public function user(){
    return $this->belongsTo('App\Models\User', 'id_user');
  }

  public function kategoriPosting(){
    return $this->belongsTo('App\Models\CategoriPosting', 'id_kategori');
  }

  public function commentPosting(){
    return $this->hasMany('App\Models\CommentPosting');
  }
}
