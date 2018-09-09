<!-- jQuery -->
<script src="{{URL::asset('user-panel/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{URL::asset('user-panel/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{URL::asset('user-panel/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{URL::asset('user-panel/js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{URL::asset('user-panel/js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{URL::asset('user-panel/js/jquery.countTo.js')}}"></script>
<!-- Flexslider -->
<script src="{{URL::asset('user-panel/js/jquery.flexslider-min.js')}}"></script>
<!-- Main -->
<script src="{{URL::asset('user-panel/js/main.js')}}"></script>

<!-- notify -->
<script src="{{URL::asset('user-panel/js/notify/notify.js')}}"></script>
<script src="{{URL::asset('user-panel/js/notify/notify.min.js')}}"></script>

        <script>
          var close = document.getElementsByClassName("closebtn");
          var i;

          for (i = 0; i < close.length; i++) {
              close[i].onclick = function(){
                  var div = this.parentElement;
                  div.style.opacity = "0";
                  setTimeout(function(){ div.style.display = "none"; }, 600);
              }
          }
        </script>
