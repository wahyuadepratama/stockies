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
	@include('guest.layouts.content-index')


	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Temukan foto yang kamu butuhkan.</h2>
					<!-- <p>Just stay tune for our latest Product. Now you can subscribe</p> -->
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-9 col-sm-9 search">
							<div class="form-group">
								<label for="text" class="sr-only"><i>Masukkan kata kunci</i></label>
								<input type="text" class="form-control" id="text" placeholder="Masukkan kata kunci">
							</div>
						</div>
						<div class="col-md-3 col-sm-2">
							<button type="submit" class="btn btn-default btn-block">Cari</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<!-- <span>Cool Stuff</span> -->
					<h2>Foto Terbaik Hari Ini</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>

			<div class="row">
				@php $x=1 @endphp
					@foreach($photo as $key)
						@if($x<=2)
							<div class="col-md-6 text-center animate-box">
								<div class="product">
									<div class="product-grid" style="background-image:URL({{asset('storage/photo/'.$key->medium)}})">
										<div class="inner">
											<p>
												<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
												<a href="/detail/{{$key->slug}}" class="icon"><i class="icon-eye"></i></a>
											</p>
										</div>
									</div>
								</div>
							</div>
					@endif
					@php $x++ @endphp
				@endforeach
			</div>

			<div class="row">
				@php $y=1 @endphp
					@foreach($photo as $key1)
						@if($y>=3 && $y<=5)
							<div class="col-md-4 text-center animate-box">
								<div class="product">
									<div class="product-grid" style="background-image:URL({{asset('storage/photo/'.$key1->small)}})">
										<div class="inner">
											<p>
												<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
												<a href="/detail/{{$key1->slug}}" class="icon"><i class="icon-eye"></i></a>
											</p>
										</div>
									</div>
								</div>
							</div>
						@endif
					@php $y++ @endphp
				@endforeach
			</div>


			<div class="row">
				@php $z=1 @endphp
					@foreach($photo as $key2)
						@if($z>=6 && $z<=9)
							<div class="col-md-3 text-center animate-box">
								<div class="product">
									<div class="product-grid" style="background-image:URL({{asset('storage/photo/'.$key2->small)}})">
										<div class="inner">
											<p>
												<a href="" class="icon"><i class="icon-shopping-cart"></i></a>
												<a href="/detail/{{$key2->slug}}" class="icon"><i class="icon-eye"></i></a>
											</p>
										</div>
									</div>
								</div>
							</div>
						@endif
					@php $z++ @endphp
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
