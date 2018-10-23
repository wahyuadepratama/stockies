<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentPosting;
use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request, $id)
    {
      $this->validator($request->all())->validate();
      Comment::create([
        'body' => $request->body,
        'id_user' => Auth::user()->id,
        'id_photo' => $id,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);
      return back();
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'body'  => 'required|string|max:190'
        ]);
    }

    public function saveCommentPosting(Request $request, $id)
    {
      $this->validator($request->all())->validate();
      CommentPosting::create([
        'body' => $request->body,
        'id_user' => Auth::user()->id,
        'id_posting' => $id,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);
      return back();
    }
}
