@extends('guest.master')

@section('content')

  <!-- content here -->

  <div id="fh5co-about">
		<div class="container">
			<div class="about-content">

				<div class="row animate-box">

          <div class="col-md-5">
            <form class="" action="/pembayaran/konfirmasi/store" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
  						<div class="desc konfirmasi">
  							<h3>Konfirmasi  Pembayaran #{{$transaksi->id}}</h3>
  							<p>Terimakasih telah melakukan transaksi pembelian. Silakan upload bukti transfer dan lakukan konfirmasi pembayaran.
                   Sebelumnya, pastikan kamu sudah melakukan transfer sebesar <b>Rp.{{$transaksi->total}}.</b></p>
                  <input type="file" name="image" value="Foto" style="margin-bottom:2%;">
                  @if ($errors->has('image'))
                    <div class="text-danger">
                        <strong><small>{{ $errors->first('image') }}</small></strong>
                    </div>
                  @endif
  							<div class="col-md-12 form-group one">
                  <input type="submit" name="image" value="Upload Bukti Transfer" class="btn btn-primary">
                  <input type="hidden" name="id" value="{{$transaksi->id}}">
  							</div>
  						</div>
            </form>
					</div>

				</div>

			</div>
		</div>
	</div>

@endsection
