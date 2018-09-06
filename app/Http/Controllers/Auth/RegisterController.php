<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:191',
            'username' => 'required|string|max:191|unique:users',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function convert_date(array $data)
    {
      $y = $data['tahun'];
      $m = $data['bulan'];
      $d = $data['tanggal'];

      if($m<10)
        $m = "0".$m;

      if($d<10)
        $d = "0".$d;

      $date = $y."-".$m."-".$d;
      return $date;
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $this->convert_date($data),
            'phone' => $data['phone'],
            'role_id' => 2,
        ]);
    }
}
