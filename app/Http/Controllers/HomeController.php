<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      if(Auth::user()->role_id == 1){
        return redirect('stockies-admin');
      }else{
        $category = $this->getCategory();
        $keyword = $this->getKeyword();
        return view('user.home')->with('category',$category)->with('keyword',$keyword);
      }
    }

    public function getCategory()
    {
      return Category::all();
    }

    public function getKeyword()
    {
      return Keyword::all();
    }
    
}
