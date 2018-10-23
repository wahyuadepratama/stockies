@extends('guest.master')

@section('content')

  <div id="fh5co-about">
    <div class="container">
      <div class="about-content">
        <div class="row animate-box">
          <div class="row">

            <div class="col-md-8">
              <h1><center>{{ $data->judul }}</center></h1><br>
              <p>
                @php echo $data->isi @endphp
              </p>
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <i>Posted By: {{ $data->user->name }}</i>
                <i>Published: {{ $data->updated_at }}</i>
              </div>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-3">
              Artikel Lainnya<br><br>
              @foreach($artikel as $artikel)
              <li> <a href="/blog/{{ $artikel->slug }}"> {{ $artikel->judul }} </a> </li>
              @endforeach
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <div id="fh5co-product" style="margin-top: 7%">
    <div class="container" style="margin-bottom:-25%">
      <div class="row">
          <div class="fh5co-tabs animate-box col-md-12">
            <!-- Tabs -->
            <div class="komentar fh5co-tab-content-wrap">
              <div class="fh5co-tab-content">
                  <div class="col-md-12">
                    <div class="col-md-7">
                      <div class="row">
                          <div class="col-md-3">
                            <p class=" kategori-text">Komentar</p>
                          </div>
                      </div>
                    </div>
                  </div>

                  @foreach($comment as $key2)
                  <div class="col-sm-12">
                    <div class="col-md-8 col-xs-12 komentar_konten">
                      <div class="col-md-2 col-sm-2 col-xs-4">
                        <img src="{{asset('storage/avatar/'.$key2->user->avatar)}}" style="border-radius:50%">
                      </div>

                      <div class="col-md-10">
                        <div class="nama_user ">{{$key2->user->name}}</div>
                        <div class="isi_komentar" style="color:grey"> {{$key2->body}} </div>
                        <div class="ket_waktu col-md-12 col-sm-12 col-xs-12">

                          <div class="col-md-5 col-sm-2 ">
                            <a>{{ \Carbon\Carbon::parse($key2->created_at)->format('d M Y / H:i:s')}}<a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach

                  @if(isset(Auth::user()->role_id))
                  <div class="col-sm-12 tulis_komentar">                    
                    <div class="col-md-8 col-sm-8 col-xs-12 komentar_konten ">
                      <div class="col-md-2 col-sm-2 col-xs-4">
                        <img src="{{asset('storage/avatar/'.Auth::user()->avatar)}}">
                      </div>
                      <div class="col-md-10">
                        <div class="row form-group col-sm-12">
                          <div class="col-md-12">
                            <form action="/blog/comment/save/{{ $data->id }}" method="post">
                              {{ csrf_field() }}
                              <textarea style="width:100%;margin-bottom:2%;" name="body" id="message" cols="50" rows="10" class="form-control" placeholder="Tulis komentar anda..."></textarea>
                              <input type="submit" class="btn" value="Kirim"></input>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
