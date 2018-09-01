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

	<div class="container">
	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{asset('storage/photo/'.$photo->medium)}});">
		<div class="overlay"></div>

			<div class="row">
				<div class=" col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
									<div class="fh5co-tabs col-md-12 ">
										<!-- Tabs -->
										<div class="fh5co-tab-content-wrap">
										<div class="fh5co-tab-content tab-content active" data-tab-content="1">

											<span class="price">IDR {{$photo->price_small}} - {{$photo->price_large}}</span>
										</div>
										</div>
									</div>
						</div>

					</div>
				</div>
			</div>
	</header>
	</div>

	<div id="fh5co-product">
		<div class="container">

			<div class="row">
					<div class="fh5co-tabs animate-box col-md-12 ">
						<!-- Tabs -->
						<div class="fh5co-tab-content-wrap">

							<div class="fh5co-tab-content tab-content active" data-tab-content="1">

								<div class="col-md-7">
									<h2>{{$photo->nama}}</h2>
									<p>Foto Oleh <a>{{$photo->user->name}}</a></p>

									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>

									<div class="row">
										<div class="col-md-12">
											<p class="col-md-3 kategori-text">Kategori</p>
											<p class="col-md-9 kategori">{{$photo->category->nama}}</p>
										</div>

										<div class="col-md-12">
											<div class="col-md-3">
												<p class="kata-kunci-text">Kata kunci</p>
											</div>

											<div class="col-md-9 kata-kunci-text">
												@foreach($keyword as $key)
												<p class="col-md-2 col-sm-3 col-xs-3 kata-kunci">{{$key->keyword->nama}}</p>
												@endforeach
											</div>
										</div>
									</div>
								</div>

									<div class="row col-md-4 icon2">
										<div class="col-md-3 col-sm-6 col-xs-6">
											@if($like != "belum login")
													@if($like)
													<a href="/dislike/{{$photo->id}}"><img src="{{asset('storage/images/like.png')}}"></a>
													<div class=""><p>{{$countLike}}</p></div>
													@else
													<a href="/like/{{$photo->id}}"><img src="{{asset('storage/images/not-like.png')}}"></a>
													<div class=""><p>{{$countLike}}</p></div>
													@endif
											@else
												<a href="/login"><img src="{{asset('storage/images/not-like.png')}}"></a>
												<div class=""><p>{{$countLike}}</p></div>
											@endif
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6">
											<img src="{{asset('storage/images/ic_file_download_24px.png')}}">
											<div class=""><p>2k</p></div>
										</div>
									</div>

								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box detail1">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<!-- <span>Cool Stuff</span> -->
					<h2>Foto Lainnya</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>
			<div class="row">
				@foreach($lainnya as $key1)
				<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key1->small)}});">
							<div class="inner">
								<p>
									<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="/detail/{{$key1->slug}}" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>

						<div class="col-md-12 product2">
								<div class="desc col-md-10 col-sm-9 col-xs-9">
									<h3 class="col-md-12 col-sm-12 col-xs-12"><a href="/detail/{{$key1->slug}}">{{$key1->nama}}</a></h3>
									<span class="price col-md-12 col-sm-12 col-xs-12"><p>Karya {{$key1->user->name}}</p></span>
								</div>
								<!-- <div class="col-md-2 col-sm-2 col-xs-2 like" >
									<img src="{{asset('storage/images/ic_favorite_24px.png')}}">
									<span><p>35k</p></span>
								</div> -->
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>

			@include('guest.layouts.content-foto-lainnya')

			<div>

			</div>

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
