@extends('guest.master')

@section('content')

	@include('guest.layouts.search-form')

	<div id="fh5co-product" class="gallery1" style="">
		<div class="container gallery2">
			<div class="row animate-box detail1">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Foto Terfavorit</h2>
				</div>
			</div>

			<!-- GALLERY 1 -->



			<div class="blogBox moreBox" >
				@php $y=1 @endphp
				@foreach($favorite as $key1)
					@if($y<=3)
						<div class="col-md-4 text-center animate-box">
							<div class="product">

								<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key1->photo->small)}});">
									<div class="inner">
										<p>
											<a href="/detail/{{$key1->photo->slug}}" class="icon"><i class="icon-shopping-cart"></i></a>
											<a href="/detail/{{$key1->photo->slug}}" class="icon"><i class="icon-eye"></i></a>
										</p>
									</div>
								</div>

								<div class="col-md-12 product2">
										<div class="desc col-md-10 col-sm-9 col-xs-9">
											<h3 class="col-md-12 col-sm-12 col-xs-12"><a href="/detail/{{$key1->photo->slug}}">{{$key1->photo->nama}}</a></h3>
											<span class="price col-md-12 col-sm-12 col-xs-12"><p>Karya {{$key1->user->username}}</p></span>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2 like" >
											<img src="{{asset('storage/images/like.png')}}">
											<span><p>{{$key1->count}}</p></span>
										</div>
								</div>
							</div>
						</div>
					@endif
					@php $y++ @endphp
				@endforeach
	    </div>

	    <div class="blogBox moreBox" style="display: none;">
				<div class="row">
					@php $x=1 @endphp
					@foreach($favorite as $key2)
						@if($x>=4 && $x<=6)
							<div class="col-md-4 text-center animate-box">
								<div class="product">

									<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key2->photo->small)}});">
										<div class="inner">
											<p>
												<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
												<a href="/detail/{{$key1->photo->slug}}" class="icon"><i class="icon-eye"></i></a>
											</p>
										</div>
									</div>

									<div class="col-md-12 product2">
											<div class="desc col-md-10 col-sm-9 col-xs-9">
												<h3 class="col-md-12 col-sm-12 col-xs-12"><a href="/detail/{{$key2->photo->slug}}">{{$key2->photo->nama}}</a></h3>
												<span class="price col-md-12 col-sm-12 col-xs-12"><p>Karya {{$key2->user->username}}</p></span>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2 like" >
												<img src="{{asset('storage/images/like.png')}}">
												<span><p>{{$key2->count}}</p></span>
											</div>
									</div>
								</div>
							</div>
						@endif
						@php $x++ @endphp
					@endforeach
				</div>
	    </div>

			@if($x > 3)
				<div class="col-md-2"></div>
				<div class="col-md-2"></div>
				<div class="col-md-1"></div>
				<div id="loadMore" style="">
					<a href="#">
						<div class="col-md-2 button" style="margin-bottom: 30px; margin-top: 30px;">
						    <p>Load More</p>
						</div>
					</a>
				</div>
			@endif

		</div>
	</div>


	<div id="fh5co-product">
		<div class="container katalog">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<!-- <span>Cool Stuff</span> -->
					<h2>Telusuri berdasarkan kategori</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>
			<div class="row">
				@foreach($category as $key2)
				<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$key2->small)}});">
							<div class="">
								<p class="katalog2">
									<strong><a style="color:white;" href="/katalog/{{$key2->category->id}}"><h3 style="color:white">{{$key2->category->nama}}</h3></a></strong>
								</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</div>

<script type="text/javascript">
	$( document ).ready(function () {

	$(".moreBox").slice(0, 1).show();

	if ($(".blogBox:hidden").length != 0) {
		$("#loadMore").show();
	}

	$("#loadMore").on('click', function (e) {
		e.preventDefault();
		$(".moreBox:hidden").slice(0, 6).slideDown();
		if ($(".moreBox:hidden").length == 0) {
			$("#loadMore").fadeOut('slow');
		}
	});
});
</script>

@endsection
