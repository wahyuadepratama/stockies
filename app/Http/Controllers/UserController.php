<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;

class UserController extends Controller
{
  public function __construct(){

      $this->middleware('auth');
      $this->middleware('user');
  }

  public function editProfile()
  {
    return view('user.edit-profile');
  }

  public function updateProfile(Request $request)
  {
    $this->validate($request,[
      'name'  => 'required',
      'phone' => 'required|string|max:15',
      'avatar' => 'required|mimes:jpeg,jpg,png|max:1024'
    ]);

    $conf     = \Config::get('sizeimage.profile');

    $file     = $request->file('avatar');
    $filename = Auth::user()->username.'.' . $file->getClientOriginalExtension();
    $path     = 'storage/avatar/' . $filename;
    $resize   = Image::make($file)->resize($conf['x'], $conf['y'])->save($path);

    $data = User::find(Auth::user()->id);
    $data->name = $request->name;
    $data->phone = $request->phone;
    $data->avatar = $filename;
    $data->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
    $data->save();

    return redirect('home')->with('success','Profile Berhasil di Update!');
  }

  public function editPassword()
  {
    return view('user.edit-password');
  }

  public function updatePassword(Request $request)
  {
    $this->validate($request,[
      'password'  => 'required|confirmed'
    ]);

    $data = User::find(Auth::user()->id);
    $data->password = bcrypt($request->password);
    $data->save();

    return redirect('home')->with('success','Password Berhasil di Update!');
  }

}
