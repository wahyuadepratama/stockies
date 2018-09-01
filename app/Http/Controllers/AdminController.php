<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Keyword;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function getAllUser(){
      $users = User::with('role')->where('role_id',2)->orderBy('name')->get();      
      $deletedUsers = User::onlyTrashed()->get();

      return view('admin/user-management', ['users' => $users, 'deletedUsers'=>$deletedUsers]);
    }

    public function deleteUser($id){
      $user = User::find($id);
      $user->delete();
      return back()->with('success','You have successfully delete user');
    }

    public function restoreUser($id){
      $restore = User::withTrashed()->where('id',$id);
      $restore->restore();
      return back()->with('success','You have successfully restore user');
    }

    public function keywordKategori()
    {
      $one = Keyword::all();
      $two = Category::all();
      return view('admin.keyword-kategori')->with('keyword', $one)->with('kategori', $two);
    }

    public function keywordStore(Request $request)
    {
      $this->validate($request,[
        'keyword'  => 'required|unique:keywords'
      ]);

      Keyword::create([
        'nama' => $request['keyword']
      ]);

      return back()->with('message', 'Keyword Berhasil Ditambahkan!');
    }

    public function kategoriStore(Request $request)
    {
      $this->validate($request,[
        'keyword'  => 'required|unique:categories'
      ]);

      Category::create([
        'nama' => $request['kategori']
      ]);

      return back()->with('message', 'Kategori Berhasil Ditambahkan!');
    }

    public function keywordDestroy($id)
    {
      Keyword::find($id)->delete();
      return back()->with('message', 'Keyword Berhasil Dihapus');
    }

    public function kategoriDestroy($id)
    {
      Kategori::find($id)->delete();
      return back()->with('message', 'Kategori Berhasil Dihapus');
    }

    public function photoManagement()
    {
        $category = Category::all();
        $keyword = Keyword::all();
        $user = User::where('role_id',2)->get();

        return view('admin.photo-management')->with('category',$category)->with('keyword',$keyword)->with('user',$user);
    }

}
