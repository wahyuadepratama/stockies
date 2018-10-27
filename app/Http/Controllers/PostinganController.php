<?php

namespace App\Http\Controllers;

use App\Models\CategoriPosting;
use App\Models\CommentPosting;
use Illuminate\Http\Request;
use App\Models\Posting;

class PostinganController extends Controller
{
    public function index()
    {
      $all = Posting::with('user')->with('kategoriPosting')->orderByRaw('created_at DESC')->paginate(5);
      $kategori = CategoriPosting::all();
      $lainnya = Posting::inRandomOrder()->take(5)->get();

      return view('guest/postingan')->with('all', $all)->with('kategori', $kategori)->with('lainnya', $lainnya);
    }

    public function show($slug)
    {
      $get = Posting::with('user')->with('kategoriPosting')->where('slug', $slug)->first();
      $random = Posting::inRandomOrder()->take(5)->get();
      $comment = CommentPosting::with('user')->where('id_posting',$get->id)->orderBy('created_at','asc')->get();
      $kategori = CategoriPosting::all();
      $lainnya = Posting::inRandomOrder()->take(5)->get();

      return view('guest/postingan-detail')->with('data', $get)
                                          ->with('artikel',$random)
                                          ->with('kategori', $kategori)
                                          ->with('lainnya', $lainnya)
                                          ->with('comment',$comment);
    }

    public function indexCategory($nama)
    {
      $data = CategoriPosting::where('nama',$nama)->first();
      $all = Posting::with('user')->with('kategoriPosting')->where('id_kategori', $data->id)->orderByRaw('created_at DESC')->paginate(5);
      $kategori = CategoriPosting::all();
      $lainnya = Posting::inRandomOrder()->take(5)->get();

      return view('guest/postingan')->with('all', $all)->with('kategori', $kategori)->with('lainnya', $lainnya);
    }

    public function finderPosting(Request $request)
    {
      $all = Posting::with('user')->with('kategoriPosting')->where('judul','like','%'. $request->search .'%')->orderByRaw('created_at DESC')->paginate(5);
      $kategori = CategoriPosting::all();
      $lainnya = Posting::inRandomOrder()->take(5)->get();

      return view('guest/postingan')->with('all', $all)->with('kategori', $kategori)->with('lainnya', $lainnya);
    }
}
