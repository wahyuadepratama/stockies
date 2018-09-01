<nav class="fh5co-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-1">
        <div id="fh5co-logo"><a href="/"><img src="{{asset('storage/images/Logo Fix.png')}}"></a></div>
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

          <li>
            @if(isset(Auth::user()->role_id))
            <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @else
            <a href="/login">
              <img src="{{asset('storage/images/ic_account_circle_24px.png')}}">Login
            </a>
            @endif
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>
