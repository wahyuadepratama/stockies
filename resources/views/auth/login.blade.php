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
		   	<li style="background-image: url({{asset('storage/images/instagram-com-jamie_fenn-1.png')}});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">

		   			<div class="col-md-2"></div>
		   			<div class="col-md-1"></div>
		   			<div class="col-md-6 col-sm-4 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="form-login">
		   						<h3>Login</h3>

                  <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}
										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="fname">Username</label> -->
												<input type="text" id="fname" class="form-control" placeholder="Username or Email" name="identity" value="{{ old('identity') }}" required autofocus>
                        @if ($errors->has('identity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('identity') }}</strong>
                            </span>
                        @endif
											</div>
										</div>

										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="password">Password</label> -->
												<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
											</div>
										</div>

										<div class="col-md-5 col-sm-4 col-xs-5 text1">
											<p><a href="{{ route('password.request') }}">Lupa Password</a></p>
										</div>

										<div class="col-md-1"></div>

										<div class="col-md-7 col-sm-8 col-xs-7 text2">
											<p>Belum punya Akun? <a href="/register">Daftar</a></p>
										</div>

										<div class="form-group">
											<input type="submit" value="Login" class="btn btn-primary">
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
