@extends('guest.master')

@section('content')

<aside id="fh5co-hero" class="">
  <div class="flexslider upload_foto">
    <ul class="slides">
      <li style="background-image: url({{asset('storage/landing/3.jpg')}});">
        <div class="overlay-gradient"></div>
      <div class="container">
          <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
            <div class="slider-text-inner">
              <div class="desc">
                <span class="price"></span>
                <h3 style="color:white; font-size:300%;font-weight:bold;">Dapatkan Penghasilan dari Karya Fotomu</h3>
              </div>
            </div>
          </div>
        </div>

      </li>
      </ul>
    </div>
</aside>

<div class="container upload_foto">
  <div class="col-md-6 animate-box ">
    <div class="text">
        <p>Suka memotret? Memiliki ratusan bahkan ribuan stok foto yang menumpuk di media penyimpanan ?</p>

        <p>Hasilkan uang dari fotomu dengan mengisi</p>

    </div>

    <div class="form_upload">
      <div class="col-md-12">
          <div class="card strpied-tabled-with-hover">
              <div class="card-body">
                <form class="" action="/photo/store" method="post" enctype="multipart/form-data" accept="image/*">
                  {{ csrf_field() }}

                  <input type="text" name="name" value="" class="form-control" placeholder="Judul" style="margin-bottom:2%;" required>
                  @if ($errors->has('name'))
                      <div class="text-danger">
                          <strong><small>{{ $errors->first('name') }}</small></strong>
                      </div>
                  @endif

                  <select name="category" class="form-control" style="margin-bottom:2%;" required>
                    <option value="0">Pilih Kategori</option>
                    @foreach($category as $isi1)
                    <option value="{{$isi1->id}}">{{$isi1->nama}}</option>
                    @endforeach
                  </select>

                  <input type="file" name="image" value="Foto" class="form-control" style="margin-bottom:2%;" required>
                  @if ($errors->has('image'))
                      <div class="text-danger">
                          <strong><small>{{ $errors->first('image') }}</small></strong>
                      </div>
                  @endif

                  <div class="col-md-4">
                    Keyword:
                  </div>
                  <div class="col-md-12" style="margin-bottom:5%;">
                  @foreach($keyword as $isi3)
                    <input type="checkbox" name="keyword[]" value="{{$isi3->id}}"> {{$isi3->nama}}</input>&nbsp;
                  @endforeach
                  </div>

                  <input type="submit" value="Upload" class="form-control btn" style="margin-top:2%; background-color:#bf8b16; color:white">
                </form>

              </div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
