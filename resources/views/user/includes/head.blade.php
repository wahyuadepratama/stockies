<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
  Stockies
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
<meta name="author" content="gettemplates.co" />

<link rel="icon" type="image/png" href="{{ asset('storage/icon/favicon2.png') }}">

<!--
//////////////////////////////////////////////////////

Selamat datang di Stockies. Stockies adalah platform stock foto
kearifan lokal terbesar yang ada di Indonesia. Temukan berbagai foto
dan video yang kamu butuhkan disini.

Website: 		http://stockies.id
Email: 			official@stockies.id
Instagram:  @stockies_id

//////////////////////////////////////////////////////
 -->

  <!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:URL" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:URL" content="" />
<meta name="twitter:card" content="" />

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">

<!-- Animate.css -->
<link rel="stylesheet" href="{{URL::asset('user-panel/css/animate.css')}}">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="{{URL::asset('user-panel/css/icomoon.css')}}">
<!-- Bootstrap  -->
<link rel="stylesheet" href="{{URL::asset('user-panel/css/bootstrap.css')}}">

<!-- Flexslider  -->
<link rel="stylesheet" href="{{URL::asset('user-panel/css/flexslider.css')}}">

<!-- Owl Carousel  -->
<link rel="stylesheet" href="{{URL::asset('user-panel/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('user-panel/css/owl.theme.default.min.css')}}">

<!-- Theme style  -->
<link rel="stylesheet" href="{{URL::asset('user-panel/css/style.css')}}">

<!-- Modernizr JS -->
<script src="{{URL::asset('user-panel/js/modernizr-2.6.2.min.js')}}"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->


<!-- menu show -->

<script type="text/javascript" src="{{URL::asset('user-panel/js/jquery.min.js')}}"></script>

 <script>
 //Inisiasi awal penggunaan jQuery
$(document).ready(function(){
  //Pertama sembunyikan elemen class gambar
        $('.gambar1').hide();
        $(".sembunyi1").hide();



  //Ketika elemen class tampil di klik maka elemen class gambar tampil
        $('.tampil1').click(function(){
   $('.gambar1').show();
   $(".tampil1").hide();
   $(".sembunyi1").show();

        });

  //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
        $('.sembunyi1').click(function(){
   //Sembunyikan elemen class gambar
   $('.gambar1').hide();
   $(".sembunyi1").hide();
   $(".tampil1").show();

        });
 });


 $(document).ready(function(){
  //Pertama sembunyikan elemen class gambar
        $('.gambar2').hide();
        $(".sembunyi2").hide();

  //Ketika elemen class tampil di klik maka elemen class gambar tampil
        $('.tampil2').click(function(){
   $('.gambar2').show();
   $(".tampil2").hide();
   $(".sembunyi2").show();

        });

  //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
        $('.sembunyi2').click(function(){
   //Sembunyikan elemen class gambar
   $('.gambar2').hide();
   $(".sembunyi2").hide();
   $(".tampil2").show();
        });
 });
 </script>
