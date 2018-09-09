@extends('guest.master')

@section('content')

  <!-- content here -->

  <div id="fh5co-about">
		<div class="container">
			<div class="about-content">
				<div class="row animate-box">
					<div class="col-md-5">
						<div class=" desc transaksi-selesai">
							<h3>Pesan #{{ $message->id }}</h3><br>

              <div class="col-md-4">
                  <p><b>Pengirim: </b></p>
                  <p><b>Pesan:</b></p>
              </div>
              <div class="col-md-4">
                  <p>{{ $message->senders->username }}</p>
                  <p>{{ $message->body }}</p>
              </div>

							<div class="form-group one">
								<a href="/home/message/delete/{{$message->id}}"><input type="submit" value="Sudah Dibaca" class="btn btn-primary"></a>
							</div>

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

@endsection
