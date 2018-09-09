@extends('guest.master')

@section('content')

  <!-- content here -->

  <div id="fh5co-about">
		<div class="container">
			<div class="about-content">
				<div class="row animate-box">
					<div class="col-md-5">
						<div class=" desc transaksi-selesai">
							<h3>Transaksi Selesai</h3>

							<p>Terimakasih telah melakukan pembelian. Item pesanan anda akan kami kirimkan melalui email ke <b>{{$email}}</b> paling lama dalam waktu 24 jam</p>

							<p>Untuk keluhan dan layanan pelanggan silahkan kirimkan melalui email ke <b>official@stockies.id</b></p>

							<div class="form-group one">
								<a href="/gallery"><input type="submit" value="Kembali ke Galeri" class="btn btn-primary"></a>
							</div>

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

@endsection
