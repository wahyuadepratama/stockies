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
              <h4>{{ \Carbon\Carbon::parse($message->created_at)->format('d M Y / H:i:s')}}</h4>

              <div class="col-md-2">
                <p><b>Pengirim</b></p>
                <p><b>Pesan</b></p>
              </div>
              <div class="col-md-1">
                <p>:</p>
                <p>:</p>
              </div>
              <div class="col-md-9">
                  <p>{{ $message->senders->username }}</p>
                  <p>{!!html_entity_decode($message->body)!!}</p>
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
