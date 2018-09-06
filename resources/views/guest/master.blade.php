<!DOCTYPE HTML>
<html>
	<head>
		@include('guest.includes.head')
		@include('guest.includes.head-index')
	</head>
	<body onload="message()">

	<div class="fh5co-loader"></div>
	<div id="page">
	@include('guest.layouts.navbar')


    @yield('content')


  @include('guest.layouts.footer')
  </div>
  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>

  @include('guest.includes.script-index')

  </body>
</html>
