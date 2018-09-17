<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
  protected $fillable = [
    'percent_discount', 'code', 'information', 'created_at', 'updated_at'
  ];
}
