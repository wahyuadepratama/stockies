<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
  Stockies
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
<meta name="author" content="gettemplates.co" />

<link rel="icon" type="image/png" href="{{ asset('storage/icon/favicon2.png') }}">

<!--
//////////////////////////////////////////////////////

FREE HTML5 TEMPLATE
DESIGNED & DEVELOPED by FreeHTML5.co

Website: 		http://freehtml5.co/
Email: 			info@freehtml5.co
Twitter: 		http://twitter.com/fh5co
Facebook: 		https://www.facebook.com/fh5co

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
