<!DOCTYPE HTML>
<html>
	<head>
	   @include('guest.includes.head')
     @include('guest.includes.head-index')
	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
	@include('guest.layouts.navbar')

	<aside id="fh5co-hero" class="">
		<div class="flexslider">
			<ul class="slides">
		   	<li class="bg-daftar" style="background-image: url({{asset('storage/landing/register.jpg')}}); ">
		   		<div class="container">
		   			<div class="col-md-12 col-sm-4 col-md-offset-3 col-md-pull-3 js-fullheight slider-text" >
		   				<div class="slider-text-inner">
		   					<div class="form-login form-daftar">
		   						<h3>Pendaftaran</h3>

                  <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}
										<div class="row form-group col-md-6">
											<div class="col-md-12 space">
												<!-- <label for="namaLengkap">Nama Lengkap</label> -->
												<input type="text" id="name" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required>
												@if ($errors->has('name'))
			                      <div class="text-danger">
			                          <strong><small>{{ $errors->first('name') }}</small></strong>
			                      </div>
			                  @endif
											</div>

											<div class="col-md-12 space">
												<!-- <label for="fname">Username</label> -->
												<input type="text" id="username" class="form-control" placeholder="Username (unique)" name="username" value="{{ old('username') }}" required>
												@if ($errors->has('username'))
			                      <div class="text-danger">
			                          <strong><small>{{ $errors->first('username') }}</small></strong>
			                      </div>
			                  @endif
											</div>

											<div class="col-md-12 space">
												<!-- <label for="email">Email</label> -->
												<input type="text" id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
												@if ($errors->has('email'))
			                      <div class="text-danger">
			                          <strong><small>{{ $errors->first('email') }}</small></strong>
			                      </div>
			                  @endif
											</div>

											<div class="col-md-12">
												<!-- <label for="kemail">Konfirmasi Email</label> -->
												<input type="text" id="phone" class="form-control" placeholder="No Handphone" name="phone" value="{{ old('phone') }}" required>
												@if ($errors->has('phone'))
			                      <div class="text-danger">
			                          <strong><small>{{ $errors->first('phone') }}</small></strong>
			                      </div>
			                  @endif
											</div>
										</div>


										<div class="row form-group col-md-6">

											<div class="col-md-12 space">
												<!-- <label for="password">Password</label> -->
												<input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
												@if ($errors->has('password'))
			                      <div class="text-danger">
			                          <strong><small>{{ $errors->first('password') }}</small></strong>
			                      </div>
			                  @endif
											</div>

											<div class="col-md-12 space">
												<!-- <label for="kpassword">Konfirmasi Password</label> -->
												<input type="password" id="kpassword" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" required>
											</div>

											<div class="col-md-12 space">
								          <div class="form-group col-md-3 col-sm-5 col-xs-5 ">
												      <label for="inputState1">Jenis Kelamin</label>
												  </div>
												  <div class="col-md-9 col-sm-3 col-xs-7">
												      <select id="inputState1" class="form-control koption" name="jenis_kelamin">
												        <option value="Laki-laki" selected>Laki-laki</option>
												        <option value="Perempuan">Perempuan</option>
												        <option value="Lainnya">Lainnya</option>
												      </select>
												   </div>

											</div>

											<div class="col-md-12 space">

												<div class="form-group col-md-3 col-sm-12 col-xs-12 ">
												      <label for="inputState2">Tanggal Lahir</label>
												  </div>
												  <div class="col-md-3 col-sm-4 col-xs-4">
												      <select id="inputState" class="form-control option" name="tanggal">
												        <option selected value="1">1</option>
												        @php $tanggal=2;  @endphp
                                @while($tanggal<=31)
                                <option value="{{$tanggal}}">{{$tanggal}}</option>
                                @php $tanggal++; @endphp
                                @endwhile
												      </select>
												   </div>

												  <div class="col-md-3 col-sm-4 col-xs-4">
												      <select id="inputState" class="form-control option" name="bulan">
												        <option selected value="1">1</option>
												        @php $bulan=2;  @endphp
                                @while($bulan<=12)
                                <option value="{{$bulan}}">{{$bulan}}</option>
                                @php $bulan++; @endphp
                                @endwhile
												      </select>
												   </div>

												   <div class="col-md-3 col-sm-4 col-xs-4">
												      <select id="inputState" class="form-control option option-year" name="tahun">
												        <option selected>1945</option>
                                @php $tahun=1946;  @endphp
                                @while($tahun<=2010)
                                <option value="{{$tahun}}">{{$tahun}}</option>
                                @php $tahun++; @endphp
                                @endwhile
												      </select>
												   </div>

											</div>
										</div>

										<div class="col-md-12 text ">
											<div class="form-check col-md-6 col-sm-12 col-xs-12 text1">
												  <input class="form-check-input" type="checkbox" value="" id="defaultCheck" required>
												  <label class="form-check-label" for="defaultCheck">
												    <p>Saya menyetujui <a>Syarat dan Ketentuan </a>Stockies</p>
												  </label>
											</div>
											<div class="col-md-4 col-sm-12 col-xs-12 text2">
												<p>Sudah punya Akun ? <a href="/login">Login</a></p>
											</div>
										</div>

										<div class="form-group" style="margin-bottom:7%;">
											<input type="submit" value="Daftar" class="btn btn-primary">
										</div>

									</form>

			   					<!-- <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p> -->
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   </ul>
		</div>
	</aside>

  @include('guest.layouts.footer')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	@include('guest.includes.script-index')

	</body>
</html>
