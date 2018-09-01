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

	@include('guest.layouts.search-form')



	<div id="fh5co-product" class="gallery1" style="">
		<div class="container gallery2">
			<div class="row animate-box detail1">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<!-- <span>Cool Stuff</span> -->
					<h2>Hasil Pencarian Untuk "{{$keyword}}"</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>

			<div class="row">
				@foreach($detail as $key1)
				<div class="col-md-4 text-center animate-box">
					<div class="product">

						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key1->small)}});">
							<div class="inner">
								<p>
									<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="single.html" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>

						<div class="col-md-12 product2">
								<div class="desc col-md-10 col-sm-9 col-xs-9">
									<h3 class="col-md-12 col-sm-12 col-xs-12"><a href="single.html">{{$key1->nama_foto}}</a></h3>
									<span class="price col-md-12 col-sm-12 col-xs-12"><p>Karya {{$key1->username}}</p></span>
								</div>
								<!-- <div class="col-md-2 col-sm-2 col-xs-2 like" >
									<img src="{{asset('storage/images/like.png')}}">
									<span><p>{{$key1->count}}</p></span>
								</div> -->
						</div>
					</div>
				</div>
				@endforeach
			</div>

			@include('guest.layouts.content-foto-lainnya')
      
		</div>
	</div>

	@include('guest.layouts.footer')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	@include('guest.includes.script-index')

	</body>
</html>
