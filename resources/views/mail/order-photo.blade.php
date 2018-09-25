<!DOCTYPE HTML>
<html>
	<head>

	</head>
	<body>

	<div class="fh5co-loader"></div>
	<div id="page">

    <div id="fh5co-product">
  		<div class="container">
        <h4>Terima kasih sudah mengunjungi <b>Stockies</b></h4>
        <p>Kami telah menerima pembayaran dari transaksi anda. Berikut adalah daftar foto yang telah anda pesan:</p>
        <table style="margin-left: 5%">
          @foreach($cart as $data)
          <tr>
            <td>Judul</td>
            <td>:</td>
            <td>{{ $data->photo->nama }}</td>
          </tr>
          <tr>
            <td>Ukuran</td>
            <td>:</td>
            <td>{{ $data->ukuran }}</td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>:</td>
            <td>Rp.{{ $data->price }}</td>
          </tr><br>
          @endforeach
        </table>
        <p>Kami sudah melampirkan foto yang anda pesan pada email ini. Terima kasih sudah membeli foto di <b>Stockies.</b></p>
      </div>
    </div>

  </body>
</html>
