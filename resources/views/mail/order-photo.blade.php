<!DOCTYPE html>
<html>
<head>


	<title>Stockies</title>

	<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">

	<style type="text/css">
		body {
			background-color: white;
			font-family: "Asap", sans-serif;
			color: #828282;
			margin: 0;
			padding: 0;
		}

		.kotak {
			width: 60%;
			background-color: rgba(191,139,22, .5);
			padding: 0 4% 4% 4%;
			margin: 5% auto;
		}

		.kotak img{
			padding-top: 4%;
		}

		.kotak h3{
			color: #bf8b16;
			font-size: 28px;
			text-align: center;
		}

		.kotak .text {
			text-align: justify;
		}

		.kotak .text a{
			text-decoration: none;
			color: #bf8b16;
		}

		.footer {
			background-color: black;
			padding: unset;

		}

		.footer .text {
			font-size: 25px;
			text-align: center;
			color: white;
			word-spacing: 3px;
			letter-spacing: 1px;
		}


	</style>

</head>


<body>




		<div class="kotak">

				<img src="https://www.stockies.id/storage/images/Logo%20Fix.png">

						<h3>Terimakasih Sudah Membeli Foto di Stockies</h3>

									<div class="text" style="padding-bottom: 5%; ">
										<div style="text-align: justify;">
											Kami telah menerima pembayaran dari transaksi anda. Berikut adalah daftar foto yang telah anda pesan :
										</div>

										<div style="padding-top: 3%; text-align: left; margin-left: 10%;">

											<table width="75%">
												@foreach($cart as $data)
												<tr>
													<th>Judul</th>
													<th width="15%">:</th>
													<th>{{ $data->photo->nama }}</th>
												</tr>
												<tr>
													<th>Ukuran</th>
													<th width="15%">:</th>
													<th>{{ $data->ukuran }}</th>
												</tr>
												<tr>
													<th>Harga</th>
													<th width="15%">:</th>
													<th>{{ $data->price }}</th>
												</tr>
												@endforeach
											</table>
										</div>

										<div style="padding-top: 5%; text-align: justify;">
											Kami sudah melampirkan foto yang anda pesan pada email ini. Terimakasih sudah membeli foto di <a href="">Stockies</a>.
										</div>
									</div>
		</div>

</body>
</html>
