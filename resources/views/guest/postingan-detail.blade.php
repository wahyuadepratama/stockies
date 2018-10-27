@extends('guest.master')

@section('content')

<div id="fh5co-product">
  <div class="container">
    <div class="image_blog">
      <header id="fh5co-header" class="fh5co-cover  blog" role="banner" style="background-image:url({{asset('storage/images/search.png')}});">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
              <div class="display-t blog2">
                <div class="display-tc animate-box" data-animate-effect="fadeIn">
                  <h2>Tutorial</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>

    <div class="container">
    	<div class="ket">
    		<p style="margin-top: 50%;"><a href="/">Home </a> / <a href="/blog/">Tutorial</a> / {{ $data->judul }}</p>
    	</div>
    </div>

    <div id="fh5co-product">
      <div class="container">

        <div class="row">
            <div class="fh5co-tabs animate-box col-md-12 ">
              <!-- Tabs -->
              <div class="fh5co-tab-content-wrap">
                <div class="fh5co-tab-content tab-content active blog3">

                  <div class="col-md-9 blog_detail">
  										<div class="animate-box">
  											<div class="product">
  												<div class="blog_image2 product-grid" style="background-image:url({{asset('storage/postingan/'.$data->foto)}});">
  												</div>
  											</div>
  										</div>
  										<center style="margin-top: 10%"><h2>{{ $data->judul }}</h2></center>
  										<div class="blo4 p-b-63">
  											<div class="text-blo4 p-t-33">
  												<div class="txt32 flex-w p-b-24">
  													<span>
  														by {{ $data->user->name }}
  														<span class="m-r-6 m-l-4">|</span>
  													</span>
  													<span>
  														{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y / H:i:s')}}
  														<span class="m-r-6 m-l-4">|</span>
  													</span>
  													<span>
  														{{ $data->kategoriPosting->nama }}
  														<span class="m-r-6 m-l-4">|</span>
  													</span>
  												</div>
  												<div>
  													@php echo $data->isi  @endphp
  												</div>
  											</div>
  										</div>

                      <div class="col-md-12">
                        <div class="col-md-7">
                          <div class="row">
                              <div class="col-md-3">
                                <p class=" kategori-text">Komentar</p>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="container">
                        @foreach($comment as $key2)
                        <div class="col-sm-12" style="margin-bottom: 2%">
                          <div class="col-md-1"></div>
                          <div class="col-md-8 col-xs-12 komentar_konten">
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <img class="img-responsive" src="{{asset('storage/avatar/'.$key2->user->avatar)}}" style="border-radius:50%">
                            </div>

                            <div class="col-md-10">
                              <div class="nama_user ">{{$key2->user->name}}</div>
                              <div class="isi_komentar" style="color:grey"> {{$key2->body}} </div>
                              <small><a>{{ \Carbon\Carbon::parse($key2->created_at)->format('d M Y / H:i:s')}}<a></small>
                            </div>
                          </div>
                        </div>
                        @endforeach

                        @if(isset(Auth::user()->role_id))
                        <div class="col-sm-12 tulis_komentar">
                          <div class="col-md-1"></div>
                          <div class="col-md-8 col-sm-8 col-xs-12 komentar_konten ">
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <img class="img-responsive" src="{{asset('storage/avatar/'.Auth::user()->avatar)}}">
                            </div>
                            <div class="col-md-10">
                              <div class="row form-group col-sm-12">
                                <div class="col-md-12">
                                  <form action="/blog/comment/save/{{$data->id}}" method="post">
                                    {{ csrf_field() }}
                                    <textarea style="width:100%;margin-bottom:2%;" name="body" id="message" cols="100" rows="3" class="form-control" placeholder="Tulis komentar anda..."></textarea>
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

                  <div class="row col-md-5 icon2 blog6">
                    <!-- SEARCH -->
                    <form action="/blog/search" method="post">
                      {{ csrf_field() }}
                      <div class="form-group col-md-6 col-xs-8 col-sm-8">
                        <label for="text" class="sr-only"><i>Masukkan kata kunci</i></label>
                          <input type="text" class="form-control" name="search" id="text" placeholder="Masukkan kata kunci">
                      </div>
                      <div class="col-md-3 col-sm-2 btn">
                        <button type="submit" class="btn btn-default btn-block">Cari</button>
                      </div>
                    </form>

                    <!-- Kategori -->

                    <div class="col-md-7 col-sm-10 col-xs-11 katakunci">
                      <h3>Kategori</h3>
                      @foreach($kategori as $isi1)
                        <p><a href="/blog/kategori/{{ $isi1->nama }}">{{ $isi1->nama }}</a></p>
                      @endforeach
                    </div>

                    <!-- POPULAR -->

                    <div class="col-md-12 col-sm-10 popular popular1">
                       <h3 >Most Popular</h3>
                       @foreach($lainnya as $isi2)
                        <div class="popularx col-md-12" style="margin-bottom: 2%">
                          <div class="col-md-8 col-sm-4 text6">
                            <div>
                              <a href="/blog/{{ $isi2->slug }}">{{ $isi2->judul }}</a>
                            </div>
                            <div class="waktu">
                              <a href="#">{{ $isi2->updated_at->diffForHumans() }}</a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>

                    <!-- ARCHIVE -->

                    <!-- <div class="col-md-12 col-sm-11 archive popular">
                      <h3>Archive</h3>

                      <div>
                        <div class="col-md-8 col-xs-9 col-sm-9 tanggal">
                          <p>July 2018</p>
                        </div>

                        <div class="col-md-3 col-xs-3 col-sm-3 banyak">
                          <p>(3)</p>
                        </div>
                      </div>

                      <div>
                        <div class="col-md-8 col-xs-9 col-sm-9 tanggal">
                          <p>September 2018</p>
                        </div>

                        <div class="col-md-3 col-xs-3 col-sm-3 banyak">
                          <p>(5)</p>
                        </div>
                      </div>

                      <div>
                        <div class="col-md-8 col-xs-9 col-sm-9 tanggal">
                          <p>Oktober 2018</p>
                        </div>
                        <div class="col-md-3 col-xs-3 col-sm-3 banyak">
                          <p>(9)</p>
                        </div>
                      </div>
                    </div> -->

                  </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
