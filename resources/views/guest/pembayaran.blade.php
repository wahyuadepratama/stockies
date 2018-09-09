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
  <div id="fh5co-about">
		<div class="container">
			<div class="about-content">

				<div class="col-md-12">
						<div class="pembayaran">

								<h3>Pembayaran</h3>

						<div class="row animate-box">
							<div class="item">
								<div class="image col-md-7">
									<h4>Item Dipesan</h4>
                    @foreach (Cart::content() as $item)
										  <img src="{{ asset('storage/photo/'.$item->options->src) }}">
                    @endforeach
								</div>

								<div class="total col-md-4">
									<h4>Total Tagihan</h4>
										<div><p>Rp {{ Cart::subtotal() }}</p></div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row animate-box">
					<div class="col-md-12">
						<div class=" desc konfirmasi pembayaran">

							<div class="item">
								<div class="form image col-md-7">
									<h4>Email Pengiriman</h4>
										<p>File foto yang anda pesan akan dikirimkan ke email berikut : </p>

											<form action="/pembayaran/save" method="post">
                        {{ csrf_field() }}
												<div class="row form-group">
													<div class="col-md-7">
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    <strong><small>{{ $errors->first('email') }}</small></strong>
                                </div>
                            @endif
														<input type="text" id="email" class="form-control" placeholder="Masukkan alamat email" name="email">
													</div>
													<div class="col-md-7">
														<input type="text" id="email_confirmation" class="form-control" placeholder="Masukkan ulang alamat email" name="email_confirmation">
													</div>
												</div>

  											<div class="form-group">
                            <input type="submit" value="Konfirmasi" class="btn btn-primary">
  											</div>
                      </form>
								</div>


								<div class="transfer col-md-4">
									<div class="col-md-12">
									<h4>Pembayaran</h4>
										<p>Lakukan pembayaran melalui bank transfer ke salah satu rekening di bawah ini : </p>
									</div>

									<div class="col-md-12 space">
										<div class="col-md-5">
										<img src="{{asset('storage/images/NoPath - Copy.png')}}">
										</div>

										<div class="text col-md-7">
										<p class="bank">Bank BNI</p>
										<p class="no_rekening">0587513004</p>
										<p class="nama">a/n Syafira Annisa</p>
										</div>
									</div>


									<div class="col-md-12 space">
										<div class="col-md-5">
										<img src="{{asset('storage/images/NoPath - Copy (2).png')}}">
										</div>

										<div class="text col-md-7">
										<p class="bank">Bank Mandiri</p>
										<p class="no_rekening">111-00-11-5840-7</p>
										<p class="nama">a/n Syafira Annisa</p>
										</div>
									</div>

									<div class="col-md-12 space">
										<div class="col-md-5">
										<img src="{{asset('storage/images/LOGO-BANK-NAGARI-SUMBAR.png')}}">
										</div>

										<div class="text col-md-7">
										<p class="bank">Bank Nagari</p>
										<p class="no_rekening">2102-0213-03925-3</p>
										<p class="nama">a/n Syafira Annisa</p>
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
    @endif

@endsection
