<!DOCTYPE HTML>
<html>
	<head>
		@include('user.includes.head')
	</head>
	<body onload="message()">

	<div class="fh5co-loader"></div>
	<div id="page">
		@include('guest.layouts.navbar')


    @yield('content')


  @include('user.layouts.footer')
  </div>
  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>

  @include('user.includes.script')

  </body>
</html>
