@extends('guest.master')

@section('content')

	<!-- content here -->
@if(Cart::content()->isEmpty())
  <div id="fh5co-product">
    <div class="container keranjang">
      <h3>Keranjang Belanja Kamu Kosong</h3>
    </div>
  </div>
@else
  <div id="fh5co-product">
		<div class="container keranjang">

			<h3>Keranjang Belanja</h3>

      @if(Cart::instance('discount')->content()->isEmpty())

  			@foreach (Cart::instance('backup')->content() as $item)
  				<div class="row">
  					<div class="col-md-3 animate-box">
  						<div class="product">
  							<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$item->options->src)}});">
  							</div>
  						</div>
  					</div>

  					<div class="ket">
  						<div class="animate-box">
  							<div class="col-md-4 product">
  								<div class=" text">
  									<div class="nama"><h2>{{  $item->name  }}</h2></div>
  									<div class="creator"><p>Foto Oleh <a href="">{{  $item->options->user  }}</a></p></div>
  									<div class="ukuran col-md-12">

  										@php $data = substr($item->options->path,0,5); @endphp
  										@if($data == "small")
  											<div class="col-md-2 col-sm-2 col-xs-1">S</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">600x400px</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">300dpi</div>
  										@elseif($data == "large")
  											<div class="col-md-2 col-sm-2 col-xs-1">L</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">6000x4000px</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">300dpi</div>
  										@else
  											<div class="col-md-2 col-sm-2 col-xs-1">M</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">1350x900px</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">300dpi</div>
  										@endif

  									</div>

  								</div>
  							</div>
  							<div class="col-md-2 text-center">
  								<div class="product">
  									<div class="x"><a href="/cart/delete/{{$item->rowId}}"><img title="Delete Item" src="{{asset('storage/images/ic_close_-1.png')}}"></a></div>
  								</div>
  							</div>

  							<div class="col-md-3 text-right animate-box">
  								<div class="product">
  										<div class="price"><h2>{{$item->price}}</h2></div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			@endforeach

      @else

        @foreach (Cart::instance('voucher')->content() as $item)
  				<div class="row">
  					<div class="col-md-3 animate-box">
  						<div class="product">
  							<div class="product-grid" style="background-image:url({{asset('storage/photo/'.$item->options->src)}});">
  							</div>
  						</div>
  					</div>

  					<div class="ket">
  						<div class="animate-box">
  							<div class="col-md-4 product">
  								<div class=" text">
  									<div class="nama"><h2>{{  $item->name  }}</h2></div>
  									<div class="creator"><p>Foto Oleh <a href="">{{  $item->options->user  }}</a></p></div>
  									<div class="ukuran col-md-12">

  										@php $data = substr($item->options->path,0,5); @endphp
  										@if($data == "small")
  											<div class="col-md-2 col-sm-2 col-xs-1">S</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">600x400px</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">300dpi</div>
  										@elseif($data == "large")
  											<div class="col-md-2 col-sm-2 col-xs-1">L</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">6000x4000px</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">300dpi</div>
  										@else
  											<div class="col-md-2 col-sm-2 col-xs-1">M</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">1350x900px</div>
  											<div class="col-md-5 col-sm-4 col-xs-5">300dpi</div>
  										@endif

  									</div>

  								</div>
  							</div>
  							<div class="col-md-2 text-center">
  								<div class="product">
  									<div class="x"><a href="/cart/delete/{{$item->rowId}}"><img title="Delete Item" src="{{asset('storage/images/ic_close_-1.png')}}"></a></div>
  								</div>
  							</div>

  							<div class="col-md-3 text-right animate-box">
  								<div class="product">
  										<div class="price"><h2>{{$item->price}}</h2></div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			@endforeach

      @endif

		<div class="animate-box">
			<div class="row border">
				<div class="col-md-3">
				</div>

				<div class="">
					<div class="col-md-4 col-sm-6 col-xs-6 product2">
						<div class="text price">
								<h2>Jumlah</h2>
						</div>
					</div>

					<div class="col-md-2"></div>

					<div class="col-md-3 col-sm-6 col-xs-6 text-right product2">
						<div class="number price">
								<div><h2>{{ Cart::count() }} Foto</h2></div>
					 	</div>
					</div>
				</div>
			</div>

			<div class="row subtotal">
				<div class="col-md-3">
				</div>

				<div class="">
					<div class="col-md-4 col-sm-6 col-xs-6 product2">
						<div class="text price">
								<h2>Subtotal</h2>
						</div>
					</div>

					<div class="col-md-2"></div>

					<div class="col-md-3 col-sm-6 col-xs-6 text-right product2">
						<div class="number price">
								<div><h2>Rp {{ Cart::subtotal() }}</h2></div>
					 	</div>
					</div>
				</div>
			</div>

      @if(Cart::instance('discount')->content()->isEmpty())

			<div class="row voucher">
				<div class="col-md-3">
				</div>
				<div class="">
					<div class="col-md-4 col-sm-6 col-xs-6 product2">
						<div class="text price">
								<p>Gunakan Voucher atau Promo</p>
						</div>
					</div>

					<div class="col-md-2"></div>

					<div class="col-md-3 col-sm-6 col-xs-6 text-right product2">
						<div class="number price">
								<form class="form-inline" method="post" action="/cart/voucher">
                  {{ csrf_field() }}
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<input class="form-control" name="voucher" placeholder="Masukkan kode voucher">
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<input type="submit" class="btn-danger" value="Gunakan Voucher" style="margin: 4%">
									</div>
								</form>
  					 	</div>
  					</div>
  				</div>
  			</div>

      @endif

			<div class="row potongan border">
				<div class="col-md-3">
				</div>

				<div class="">
					<div class="col-md-4 col-sm-4 col-xs-4 product2">
						<div class="text price">
								<h2>Potongan</h2>
						</div>
					</div>

          <div class="col-md-3 col-sm-4 col-xs-4 text-right">
						<p></p>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-4 text-right product2">
						<div class="number price">
              @if(Cart::instance('discount')->content()->isEmpty())
                <h2></h2>
              @else
                <h2>
                  @php
                    $totalDiskon = str_replace(',', '', Cart::instance('voucher')->subtotal()) - str_replace(',', '', Cart::instance('backup')->subtotal());
                    echo "Rp ". $totalDiskon.".00";
                  @endphp
                </h2>
              @endif
					 	</div>
					</div>
				</div>
			</div>


			<div class="row total border" style="margin-bottom: 5%;">
				<div class="col-md-3">
				</div>

				<div class="">
					<div class="col-md-4 col-sm-6 col-xs-6 product2">
						<div class="text price">
								<h2>Total</h2>
						</div>
					</div>

					<div class="col-md-2"></div>

					 <div class="col-md-3 col-sm-6 col-xs-6 text-right product2">
						  <div class="number price">
								<div>
									<h2>Rp {{ Cart::instance('backup')->subtotal() }}</h2>
  						  </div>
  					 	</div>
  				 </div>

           <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:5%;">
             <a href="/pembayaran"><button style="background-color: #5bc0de;" type="submit" class="btn btn-danger form-control">Lanjutkan Pembayaran</button></a>
           </div>

  				</div>
  			</div>
  		</div>
  	</div>
  </div>
@endif

@endsection
