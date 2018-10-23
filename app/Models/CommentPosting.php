<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPosting extends Model
{
  protected $table = 'comment_posting';
  protected $fillable = [
    'body', 'id_user', 'id_posting', 'created_at', 'updated_at'
  ];

  public function posting(){
    return $this->belongsTo('App\Models\Posting','id_posting');
  }

  public function user(){
    return $this->belongsTo('App\Models\User','id_user');
  }
}
