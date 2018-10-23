<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriPosting extends Model
{
  protected $table = 'categori_posting';
  protected $fillable = [
    'nama', 'created_at', 'updated_at'
  ];

  public function posting(){
    return $this->hasMany('App\Models\Posting');
  }

}
