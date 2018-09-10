@extends('guest.master')

@section('content')

	@include('guest.layouts.content-index')
	@include('guest.layouts.search-form')


	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<!-- <span>Cool Stuff</span> -->
					<h2>Foto Terbaik Hari Ini</h2>
					<script type="text/javascript">

					</script>
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
												<a href="/detail/{{$key->slug}}" class="icon"><i class="icon-shopping-cart"></i></a>
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
												<a href="/detail/{{$key1->slug}}" class="icon"><i class="icon-shopping-cart"></i></a>
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
												<a href="/detail/{{$key2->slug}}" class="icon"><i class="icon-shopping-cart"></i></a>
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

@endsection
