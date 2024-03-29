@extends('user.master')

@section('content')
    <div id="fh5co-about">
      <div class="container">
        <div class="row animate-box">

          <div class="col-md-3 animate-box">
            <center>
              <img src="{{ asset('storage/avatar/'.Auth::user()->avatar) }}" style="border-radius:50%">
              <h3 style="margin-top:5%">{{Auth::user()->name}}</h3>
              <strong class="email">{{Auth::user()->email}}</strong><br>
              <p>{{Auth::user()->username}}</p>
              <p>{{Auth::user()->phone}}</p>
              <p>
                <a href="/home/wallet" style="font-weight:bolder;color:black" class="btn btn-default">
                  <img src="{{ asset('storage/images/money.png') }}" style="border-radius:">&nbsp; Rp {{number_format((Auth::user()->wallet),0,',','.')}}
                </a>
              </p>
              <a href="/home/profile" class="btn btn-info">Update Profile</a>
              <a href="/home/change-password" class="btn btn-danger">Ubah Password</a>
            </center>
          </div>


          <div class="col-md-9 animate-box" data-animate-effect="fadeIn">

            <div class="col-md-12" style="margin-bottom: 3%">
              <h3>Dashboard</h3>
              @foreach($waiting as $waiting)
              <div class="alert orange animate-box" style="background-color: #dc3545;">
                <span class="closebtn">&times;</span>
                <a style="color:white;" href="/pembayaran/konfirmasi/{{$waiting->id}}"><b>#{{$waiting->id}} Segera Lakukan Konfirmasi Pembayaran Kamu Disini</b></a>
              </div>
              @endforeach
              @foreach($paid as $paid)
              <div class="alert orange animate-box" style="background-color: #28a745;">
                <span class="closebtn">&times;</span>
                <a style="color:white;" href="/pembayaran/konfirmasi/selesai/{{$paid->id}}"><b>#{{$paid->id}} Pembayaran Berhasil Dilakukan! Foto Menunggu Verifikasi Admin. Klik Disini Untuk Info Lebih Lanjut</b></a>
              </div>
              @endforeach
              @foreach($active as $active)
              <div class="alert orange animate-box" style="background-color: #007bff;">
                <span class="closebtn">&times;</span>
                <a style="color:white;" href="#"><b>#{{$active->id}} Foto dengan judul "{{$active->nama}}" sedang menunggu persetujuan admin untuk segera di publish.</b></a>
              </div>
              @endforeach
            </div>
            <div class="notifikasi">
              <div class="icon_text">
                <div class="col-md-1 col-xs-1 col-sm-1"><img src="{{asset('storage/images/icon_notification.png')}}"></div>
                <div class="col-md-3 col-xs-4 col-sm-10 text"><h4>Notifikasi ({{ $notif }})</h4></div>
              </div>
              <div class="col-md-12">
                @foreach($message as $message)
                <div class="alert orange col-sm-12 col-xs-12 animate-box" style="background-color:#bf8b16c9;color:white;">
                 <span class="closebtn">&times;</span>
                  <div class="col-md-7">
                    <a style="color:white;" href="/home/message/{{$message->id}}">#{{ $message->id }} Kamu menerima pesan baru dari <b>{{ $message->senders->username }}</b></a>
                  </div>
                  <div class="col-md-3">{{ \Carbon\Carbon::parse($message->created_at)->format('d M Y / H:i:s')}}</div>
                </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div id="fh5co-product">
  		<div id="dashboard" class="container sukai">
  			<div class="row animate-box dashboard_title">
  				<div class="col-md-8">
  					<div  class="col-md-1 col-sm-2 col-xs-2 icon3"><img src="{{asset('storage/images/ic_add_a_photo_24px.png')}}"></div>
  					<div class="col-md-5 col-sm-10 col-xs-10"><h2>Foto yang kamu unggah</h2></div>
  				</div>
  			</div>

  			<div class="row empat">
          @foreach($yours as $you)
  				<div class="col-md-3 text-center animate-box">
  					<div class="product">
  						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$you->small)}});">
  							<div class="inner">
  								<p>
  									<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
  									<a href="/detail/{{$you->slug}}" class="icon"><i class="icon-eye"></i></a>
  								</p>
  							</div>
  						</div>
  					</div>
  				</div>
          @endforeach
  			</div>
  		</div>
  	</div>


    <div id="fh5co-product">
  		<div id="dashboard" class="container sukai">
  			<div class="row animate-box dashboard_title">
  				<div class="col-md-8">
  					<div  class="col-md-1 col-sm-2 col-xs-2 icon3"><img src="{{asset('storage/images/wait.png')}}"></div>
  					<div class="col-md-5 col-sm-10 col-xs-10"><h2>Foto yang sedang diproses</h2></div>
  				</div>
  			</div>

  			<div class="row empat">
          @foreach($konfirmasi as $key0)
  				<div class="col-md-3 text-center animate-box">
  					<div class="product">
  						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key0->small)}});">
  							<div class="inner">
  								<p>
  									<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
  									<a href="/detail/{{$key0->slug}}" class="icon"><i class="icon-eye"></i></a>
  								</p>
  							</div>
  						</div>
  					</div>
  				</div>
          @endforeach
  			</div>
  		</div>
  	</div>

    <div id="fh5co-product">
  		<div id="dashboard" class="container sukai">
  			<div class="row animate-box dashboard_title">
  				<div class="col-md-8">
  					<div  class="col-md-1 col-sm-2 col-xs-2 icon3"><img src="{{asset('storage/images/like.png')}}"></div>
  					<div class="col-md-5 col-sm-10 col-xs-10"><h2>Foto yang saya sukai</h2></div>
  					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
  				</div>
  			</div>

  			<div class="row empat">
          @foreach($likes as $key1)
  				<div class="col-md-3 text-center animate-box">
  					<div class="product">
  						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key1->photo->small)}});">
  							<div class="inner">
  								<p>
  									<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
  									<a href="/detail/{{$key1->photo->slug}}" class="icon"><i class="icon-eye"></i></a>
  								</p>
  							</div>
  						</div>
  					</div>
  				</div>
          @endforeach
  			</div>

  		</div>
  	</div>

    <div id="fh5co-product">
  		<div id="dashboard" class="container unduh">
  			<div class="row animate-box dashboard_title">
  				<div class="col-md-9">
  					<div  class="col-md-1 col-sm-2 col-xs-2 icon3"><img src="{{asset('storage/images/download.png')}}"></div>
  					<div class="col-md-5 col-sm-10 col-xs-10"><h2>Foto yang saya beli</h2></div>
  					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
  				</div>
  			</div>

  			<div class="row empat">
          @foreach($transaksi as $key2)
  				<div class="col-md-3 text-center animate-box">
  					<div class="product">
  						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key2->small)}});">
  							<div class="inner">
  								<p>
  									<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
  									<a href="/detail/{{$key2->slug}}" class="icon"><i class="icon-eye"></i></a>
  								</p>
  							</div>
  						</div>
  					</div>
  				</div>
          @endforeach
        </div>

  		</div>
  	</div>
@endsection
