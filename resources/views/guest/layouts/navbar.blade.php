<nav class="fh5co-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-1">
        <div id="fh5co-logo" class="pos-demo"><a href="/"><img src="{{asset('storage/images/Logo Fix.png')}}"></a></div>
      </div>
      <div class="col-md-6 col-xs-8 text-center menu-1">
        <ul>
          <li class="" >
            <a href="" style="color: #bf8b16">
              <img src="{{asset('storage/images/ic_add_a_photo_24px.png')}}">
            Unggah Foto</a>
          </li>

          <li><a href="/katalog">Cari Foto</a></li>

          <li class="">
            <a href="/about">Tentang Kami</a>
          </li>

          @if(isset(Auth::user()->role_id))
          <li>
            <a href="/home">{{Auth::user()->name}}</a>
          </li>

          <li class="shopping-cart">
            <a href="/cart" class="cart"><span><small>{{ Cart::instance('default')->count(false) }}</small><i class="icon-shopping-cart"></i></span></a>
          </li>
          @else
          <li>
            <a href="/login">
              <img src="{{asset('storage/images/ic_account_circle_24px.png')}}">Login
            </a>
          </li>
          @endif

          <!-- <li>
            @if(isset(Auth::user()->role_id))
            <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
          </li> -->
        </ul>
      </div>
    </div>

  </div>
</nav>
