<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('admin.includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>

  <body onload="message()">
    <div class="wrapper">

      <div class="sidebar" data-color="blue" data-image="{{ URL::asset('admin-panel/assets/img/sidebar-4.jpg') }}">

        <!--Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
            Tip 2: you can also add an image using data-image tag-->

          <div class="sidebar-wrapper">
              <div class="logo">
                  <a href="/" class="simple-text">
                      Welcome Admin
                  </a>
              </div>
              <ul class="nav">
                  <li class="nav-item {{ Request::is('stockies-admin') ? 'active' : '' }}">
                      <a class="nav-link" href="/stockies-admin">
                          <i class="nc-icon nc-chart-pie-35"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/user-management') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/user-management">
                          <i class="nc-icon nc-single-02"></i>
                          <p>User Management</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/keyword-kategori') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/keyword-kategori">
                          <i class="nc-icon nc-settings-tool-66"></i>
                          <p>Keyword & Kategori</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/photo-management') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/photo-management">
                          <i class="nc-icon nc-album-2"></i>
                          <p>Photo Management</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/transaction') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/transaction">
                          <i class="nc-icon nc-delivery-fast"></i>
                          <p>Transaction</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/message') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/message">
                          <i class="nc-icon nc-email-83"></i>
                          <p>Messages</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/comment') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/comment">
                          <i class="nc-icon nc-ruler-pencil"></i>
                          <p>Comments</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/voucher') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/voucher">
                          <i class="nc-icon nc-paper-2"></i>
                          <p>Vouchers</p>
                      </a>
                  </li>
                  <li class="nav-item {{ Request::is('admin/config') ? 'active' : '' }}">
                      <a class="nav-link" href="/admin/config">
                          <i class="nc-icon nc-settings-tool-66"></i>
                          <p>Configuration</p>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="main-panel">

        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class=" container-fluid  ">
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="no-icon"> {{Auth::user()->email}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

      </div>

    </div>

  </body>
  @include('admin.includes.js')
</html>
