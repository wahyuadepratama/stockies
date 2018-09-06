<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Keyword;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\KeywordPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Exception\NotReadableException;

class PhotoController extends Controller
{
    public function index()
    {
      $one = Photo::active()->with('user')->paginate(9);

      return view('guest.gallery')->with('gallery', $one);
    }

    public function indexFavorite()
    {
      $one = Status::with('photo')
             ->select('status.*',DB::raw('COUNT(id_photo) as count'))
             ->groupBy('status.id_photo')
             ->orderBy('count','desc')
             ->take(6)
             ->get();
      $two = Photo::active()->with('category')->with('user')->groupBy('id_category')->orderBy('id_category','desc')->get();

      return view('guest.katalog')->with('favorite', $one)->with('category', $two);
    }

    public function show($slug)
    {
      $one = Photo::active()->with('user')->with('category')->where('slug',$slug)->first();
      $two = KeywordPhoto::with('keyword')->where('id_photo',$one->id)->get();
      $three = Photo::active()->with('user')->inRandomOrder()->take(3)->get();

        if(Auth::user() == null)
          $four = "belum login";
        else
          $four = Status::where('id_user',Auth::user()->id)->where('id_photo',$one->id)->first();

      $five = Status::where('id_photo', $one->id)->get();
      $six = Comment::with('user')->where('id_photo',$one->id)->orderBy('created_at','asc')->get();

      if(isset($five))
        $five = $five->count();
      else
        $five = 0;

      return view('guest.detail')->with('photo', $one)
                                ->with('keyword', $two)
                                ->with('lainnya', $three)
                                ->with('like', $four)
                                ->with('countLike', $five)
                                ->with('comment', $six);
    }

    public function store(Request $request)
    {
      if($request->category == "0")
        return back();

      if(Auth::user()->role_id == 2)
        $user = Auth::user()->id;
      else
        $user = $request->user;

      $this->validator($request->all())->validate();

      if( $request->hasFile('image') ) {
            $thumbnail     = $request->file('image');
            $filename      = Auth::user()->username.'_'.time() . '.' . $thumbnail->getClientOriginalExtension();

            $conf = \Config::get('sizeimage.ukuran');

            $thumb       = 'storage/photo/' . 'thumb_'.$filename;   // direktori gambar dengan nama uploads
            $createThumb = Image::make($thumbnail)->resize($conf['thumb']['x'], $conf['thumb']['y']);
            $this->watermark($createThumb,$thumb);

            $small       = 'storage/photo/' . 'small_'.$filename;   // direktori gambar dengan nama uploads
            $createSmall = Image::make($thumbnail)->resize($conf['small']['x'], $conf['small']['y'])->save($small);
            $this->watermark($createSmall,$small);

            $medium       = 'storage/photo/' . 'medium_'.$filename;   // direktori gambar dengan nama uploads
            $createMedium = Image::make($thumbnail)->resize($conf['medium']['x'], $conf['medium']['y'])->save($medium);
            $this->watermark($createMedium,$medium);

            $large       = 'storage/photo/' . 'large_'.$filename;   // direktori gambar dengan nama uploads
            $createLarge = Image::make($thumbnail)->resize($conf['large']['x'], $conf['large']['y'])->save($large);
            $this->watermark($createLarge,$large);

            //------------------------------ ORIGINAL FOTO ---------------------------------

            $large_ori   = 'storage/original_photo/' . $request->name . '_large_'.$filename;   // direktori gambar dengan nama uploads
            Image::make($thumbnail)->resize($conf['large']['x'], $conf['large']['y'])->save($large_ori);

            $medium_ori   = 'storage/original_photo/' . $request->name . '_medium_'.$filename;   // direktori gambar dengan nama uploads
            Image::make($thumbnail)->resize($conf['medium']['x'], $conf['medium']['y'])->save($medium_ori);

            $small_ori   = 'storage/original_photo/' . $request->name . '_small_'.$filename;   // direktori gambar dengan nama uploads
            Image::make($thumbnail)->resize($conf['small']['x'], $conf['small']['y'])->save($small_ori);


            Photo::create([ //simpan ke database
              'nama' => $request->name,
              'slug' => str_slug($request->name.'-'.time()),
              'thumbnail' => 'thumb_'.$filename,
              'small' => 'small_'.$filename,
              'medium' => 'medium_'.$filename,
              'large' => 'large_'.$filename,
              'small_ori' => $request->name.'_small_'.$filename,
              'medium_ori' => $request->name.'_medium_'.$filename,
              'large_ori' => $request->name.'_large_'.$filename,
              'price_small' => $request->price_small,
              'price_medium' => $request->price_medium,
              'price_large' => $request->price_large,
              'id_category' => $request->category,
              'id_user' => $user,
              'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
            ]);

            $id = Photo::orderBy('id','desc')->first();
            foreach($request['keyword'] as $isi){
              KeywordPhoto::create([
                'id_keyword' => $isi,
                'id_photo' => $id->id
              ]);
            }

            return back()->with('success','Foto Berhasil Ditambahkan');
        }
    }

    public function watermark($img, $filename)
    {
      $con = \Config::get('sizeimage.watermark');

      $watermark =  Image::make('storage/icon/watermark.png');
      $watermark->opacity($con['opacity']);

      $img = Image::make($img);
      //#1
      $watermarkSize = $img->width() - 20; //size of the image minus 20 margins
      //#2
      $watermarkSize = $img->width() / 2; //half of the image size
      //#3
      $resizePercentage = $con['percentage'];//70% less then an actual image (play with this value)
      $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

      // resize watermark width keep height auto
      $watermark->resize($watermarkSize, null, function ($constraint) {
          $constraint->aspectRatio();
      });
      //insert resized watermark to image center aligned
      $img->insert($watermark, 'center');
      //save new image
      $img->save($filename);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'image' => 'required|mimes:jpeg,jpg,png|max:1000',
            'name'  => 'required|string',
            'category' => 'required',
            'price_small' => 'required',
            'price_medium' => 'required',
            'price_large' => 'required'
        ]);
    }

    public function saveLike($photo)
    {
      Status::create([
        'likes' => 1,
        'id_user' => Auth::user()->id,
        'id_photo' => $photo,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back();
    }

    public function destroyLike($photo)
    {
      $status = Status::where('id_photo',$photo)->where('id_user',Auth::user()->id);
      $status->delete();
      return back();
    }

    public function showCategory($id)
    {
      $one = Photo::active()->with('user')->where('id_category',$id)->take(6)->get();
      $two = Category::find($id);

      return view('guest.katalog-category')->with('detail', $one)->with('category', $two);
    }

    public function searchKeyword(Request $request)
    {
      $one = Keyword::join('keywords_photos','keywords.id','=','keywords_photos.id_keyword')
                ->join('photos','photos.id','=','keywords_photos.id_photo')
                ->join('users','photos.id_user','=','users.id')
                ->select('keywords.*', 'keywords_photos.*', 'photos.*', 'photos.nama as nama_foto', 'users.*')
                ->where('keywords.nama','LIKE','%'.$request->search.'%')
                ->where('photos.active','=',1)
                ->groupBy('nama_foto')
                ->get();

      return view('guest.katalog-keyword')->with('detail',$one)->with('keyword',$request->search);
    }
}
