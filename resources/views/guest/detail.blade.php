@extends('guest.master')

@section('content')

	<div class="container" style="margin-top:7%">
		<header id="image" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{asset('storage/photo/'.$photo->small)}});">
			<div class="overlay"></div>

				<div class="row">
					<div class=" col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
										<div class="fh5co-tabs col-md-12 ">
											<!-- Tabs -->
											<div class="fh5co-tab-content-wrap">
											<div class="fh5co-tab-content tab-content active" data-tab-content="1">

												<span class="price">IDR Rp{{number_format(($photo->price_small),0,',','.')}} - Rp{{number_format(($photo->price_large),0,',','.')}}</span>

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
												<div class="col-md-3 col-sm-2 col-xs-2">
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

												<div class="col-md-3 col-sm-2 col-xs-2">
													<img src="{{asset('storage/images/ic_share_24px.png')}}">
												</div>

												<form action="/cart" method="post">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<select name="data" onchange="change(this.value)" class="option_ukuran form-control koption">
															<option class="form-control" value="0">Pilih ukuran</option>
															<option class="form-control" value="{{ $photo->price_small }}|{{ $photo->small }}|{{ $photo->thumbnail }}|small" >S (500x334px and Price Rp{{$photo->price_small}})</option>
															<option class="form-control" value="{{ $photo->price_medium }}|{{ $photo->medium }}|{{ $photo->thumbnail }}|medium">M (1000x667px and Price Rp{{$photo->price_medium}})</option>
															<option class="form-control" value="{{ $photo->price_large }}|{{ $photo->large }}|{{ $photo->thumbnail }}|large">L (6000x4000px and Price Rp{{$photo->price_large}})</option>
														</select>
													</div>

													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="option_ukuran">

																{{ csrf_field() }}
																<input type="hidden" name="nama" value="{{$photo->nama}}">
																<input type="hidden" name="id" value="{{$photo->id}}">
																<input type="hidden" name="name" value="{{$photo->user->name}}">
																<input type="hidden" name="username" value="{{$photo->user->username}}">
																<input type="submit" class="btn btn-default btn-block" value="Dapatkan foto ini">

															<script type="text/javascript">
																function change($value){
																	if($value == "{{ $photo->price_small }}|{{ $photo->small }}|{{ $photo->thumbnail }}|small"){
																		return document.getElementById("image").style.backgroundImage = "url({{asset('storage/photo/')}}"+"/{{$photo->small}})";
																	}
																	if($value == "{{ $photo->price_medium }}|{{ $photo->medium }}|{{ $photo->thumbnail }}|medium"){
																		return document.getElementById("image").style.backgroundImage = "url({{asset('storage/photo/')}}"+"/{{$photo->medium}})";
																	}
																	if($value == "{{ $photo->price_large }}|{{ $photo->large }}|{{ $photo->thumbnail }}|large"){
																		return document.getElementById("image").style.backgroundImage = "url({{asset('storage/photo/')}}"+"/{{$photo->large}})";
																	}
																}
															</script>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div id="fh5co-product">
						<div class="container" style="margin-bottom:-25%">
							<div class="row">
									<div class="fh5co-tabs animate-box col-md-12">
										<!-- Tabs -->
										<div class="komentar fh5co-tab-content-wrap">
											<div class="fh5co-tab-content">
													<div class="col-md-12">
														<div class="col-md-7">
															<div class="row">
																	<div class="col-md-3">
																		<p class=" kategori-text">Komentar</p>
																	</div>
															</div>
														</div>
													</div>

													@foreach($comment as $key2)
													<div class="col-sm-12">
														<div class="col-md-1"></div>
														<div class="col-md-8 col-xs-12 komentar_konten">
															<div class="col-md-2 col-sm-2 col-xs-4">
																<img src="{{asset('storage/avatar/'.$key2->user->avatar)}}" style="border-radius:50%">
															</div>

															<div class="col-md-10">
																<div class="nama_user ">{{$key2->user->name}}</div>
																<div class="isi_komentar" style="color:grey"> {{$key2->body}} </div>
																<div class="ket_waktu col-md-12 col-sm-12 col-xs-12">

																	<div class="col-md-5 col-sm-2 ">
																		<a>{{ \Carbon\Carbon::parse($key2->created_at)->format('d M Y / H:i:s')}}<a>
																	</div>

																</div>
															</div>
														</div>
													</div>
													@endforeach

													@if(isset(Auth::user()->role_id))
													<div class="col-sm-12 tulis_komentar">
														<div class="col-md-1"></div>
														<div class="col-md-8 col-sm-8 col-xs-12 komentar_konten ">
															<div class="col-md-2 col-sm-2 col-xs-4">
																<img src="{{asset('storage/avatar/'.Auth::user()->avatar)}}">
															</div>
															<div class="col-md-10">
																<div class="row form-group col-sm-12">
																	<div class="col-md-12">
																		<form action="/comment/save/{{$photo->id}}" method="post">
																			{{ csrf_field() }}
																			<textarea style="width:100%;margin-bottom:2%;" name="body" id="message" cols="50" rows="10" class="form-control" placeholder="Tulis komentar anda..."></textarea>
																			<input type="submit" class="btn" value="Kirim"></input>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
													@endif
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
															<a href="/detail/{{$key1->slug}}" class="icon"><i class="icon-shopping-cart"></i></a>
															<a href="/detail/{{$key1->slug}}" class="icon"><i class="icon-eye"></i></a>
														</p>
													</div>
												</div>

												<div class="col-md-12 product2">
														<div class="desc col-md-10 col-sm-9 col-xs-9">
															<h3 class="col-md-12 col-sm-12 col-xs-12"><a href="/detail/{{$key1->slug}}">{{$key1->nama}}</a></h3>
															<span class="price col-md-12 col-sm-12 col-xs-12"><p>Karya {{$key1->user->name}}</p></span>
														</div>
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

@endsection
