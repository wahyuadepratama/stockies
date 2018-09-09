<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
  Stockies
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Stockies adalah platform stock foto kearifan lokal terbesar yang ada di Indonesia" />
<meta name="keywords" content="stockies, kearifan lokal, stock foto, foto indonesia, stockies indonesia, indonesia, video indonesia, cerita foto, foto gratis, free photo" />
<meta name="author" content="stockies team" />

<link rel="icon" type="image/png" href="{{ asset('storage/icon/favicon2.png') }}">

<!--
//////////////////////////////////////////////////////

Selamat datang di Stockies. Stockies adalah platform stock foto
kearifan lokal terbesar yang ada di Indonesia. Temukan berbagai foto
dan video yang kamu butuhkan disini.

Website: 		http://stockies.id
Email: 			official@stockies.id
Instagram:  @stockies_id

//////////////////////////////////////////////////////
 -->

  <!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:URL" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:URL" content="" />
<meta name="twitter:card" content="" />

<script type="text/javascript">
function message(){
  @if($message = Session::get('success'))

    $(".pos-demo").notify(
      "{{ $message }}", "success",
      { position:"bottom" }
    );

  @elseif($message = Session::get('warning'))

    $(".pos-demo").notify(
      "{{ $message }}", "warn",
      { position:"bottom" }
    );

  @elseif($message = Session::get('info'))

    $(".pos-demo").notify(
      "{{ $message }}", "info",
      { position:"bottom" }
    );

  @elseif($message = Session::get('error'))

    $(".pos-demo").notify(
      "{{ $message }}", "error",
      { position:"bottom" }
    );

  @elseif($errors->first())

    $(".pos-demo").notify(
      "{{ $message }}", "error",
      { position:"bottom" }
    );

  @else
    return false;
  @endif
}
</script>
