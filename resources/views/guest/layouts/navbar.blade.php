<nav class="fh5co-nav" role="navigation">
  <div class="container" style="font-weight:bolder; ">
    <div class="row">
      <div class="col-md-5 col-xs-1">
        <div id="fh5co-logo" class="pos-demo"><a href="/"><img src="{{asset('storage/images/Logo Fix.png')}}"></a></div>
      </div>
      <div class="col-md-7 col-xs-8 text-center menu-1">
        <ul>
          <li class="" >
            <a href="/upload" style="color: #bf8b16">
              <img src="{{asset('storage/images/ic_add_a_photo_24px.png')}}">
            Unggah Foto</a>
          </li>

          <li><a href="/katalog">Cari Foto</a></li>

          <li class="">
            <a href="/about">Tentang Kami</a>
          </li>

          @if(isset(Auth::user()->role_id))

            @if(Auth::user()->role_id == 2)
              <li class="shopping-cart">
                <a href="/cart" class="cart"><span><small>{{ Cart::instance('default')->count(false) }}</small><i class="icon-shopping-cart"></i></span></a>
              </li>

              <!-- <li class="has-dropdown">
                <a href="services.html"><img src="{{asset('storage/images/icon_notification.png')}}"></a>
                <ul class="dropdown">
                  <div>
                    <span class="closebtn">&times;</span>
                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></li>
                  </div>
                </ul>
              </li> -->
            @endif

            @if(Request::is('home'))
              <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            @else
            <li>
              <a href="/home">{{Auth::user()->username}}</a>
            </li>
            @endif

          @else
          <li class="has-dropdown">
  						<a href="/login">
  							<img src="{{asset('storage/images/ic_account_circle_24px.png')}}">
  						Login</a>

  						<ul class="dropdown login">
  							<div>
  								<li>Sudah punya Akun ?</li>
  								<a href="/login"><button type="submit" class="btn btn-default btn-block checkout"><p>Login</p></button></a>
  							</div>

  							<div>
  								<li>Ingin membuat Akun ?</li>
  								<a href="/register"><button type="submit" class="btn btn-default btn-block checkout"><p>Daftar</p></button></a>
  							</div>
  						</ul>
  				 </li>
           @endif
        </ul>
      </div>
    </div>

  </div>
</nav>
