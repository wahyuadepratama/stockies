@extends('guest.master')

@section('content')

	@include('guest.layouts.search-form')

	<div id="fh5co-product" class="gallery1" style="">
		<div class="container gallery2">

			<div class="row animate-box detail1">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Gallery</h2>
				</div>
			</div>

			<div class="row">
				@foreach($gallery as $key)
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(storage/photo/{{$key->small}});">
								<div class="inner">
									<p>
										<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="detail/{{$key->slug}}" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="col-md-12 product2">
									<div class="desc col-md-10 col-sm-9 col-xs-9">
										<h3 class="col-md-12 col-sm-12 col-xs-12"><a href="detail/{{$key->slug}}">{{$key->nama}}</a></h3>
										<span class="price col-md-12 col-sm-12 col-xs-12"><p>Karya {{$key->user->username}}</p></span>
									</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<center>{{ $gallery->links() }}</center>


		</div>
	</div>

@endsection
