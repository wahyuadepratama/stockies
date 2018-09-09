<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'username' ,'email','role_id','password','avatar', 'jenis_kelamin', 'tanggal_lahir', 'phone', 'active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
      return $this->belongsTo('App\Models\Role','role_id');
    }

    public function photo(){
      return $this->hasMany('App\Models\Photo');
    }

    public function comment(){
      return $this->hasMany('App\Models\Comment');
    }

    public function transaction(){
      return $this->hasMany('App\Models\Transaction');
    }

    public function message(){
      return $this->hasMany('App\Models\Message');
    }
}
