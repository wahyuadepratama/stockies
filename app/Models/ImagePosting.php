<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePosting extends Model
{
  protected $fillable = [
    'id', 'name', 'path', 'created_at', 'updated_at'
  ];
}
