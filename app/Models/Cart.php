<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $fillable = [
    'id_photo', 'id_transaksi', 'price', 'ukuran', 'path', 'created_at', 'updated_at'
  ];

  public function photo(){
    return $this->belongsTo('App\Models\Photo','id_photo');
  }

  public function transaction(){
    return $this->belongsTo('App\Models\Transaction','id_transaksi');
  }
}
