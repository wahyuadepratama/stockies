@extends('user.master')

@section('content')
    <div id="fh5co-about">
      <div class="container">
        <div class="row">

          <div class="col-md-4">
            <center>
              <img src="{{ asset('storage/avatar/'.Auth::user()->avatar) }}" style="border-radius: 50%;">
              <h3 style="margin-top:5%">{{Auth::user()->name}}</h3>
              <strong class="email">{{Auth::user()->email}}</strong><br>
              <p>{{Auth::user()->username}}</p>
              <p>{{Auth::user()->phone}}</p>
            </center>
          </div>

          <div class="col-md-7">
            <form action="/home/profile/update" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <span>Username</span>
              <input class="form-control" type="text" readonly value="{{Auth::user()->username}}"><br>
              <span>Email</span>
              <input class="form-control" type="text" readonly value="{{Auth::user()->email}}"><br>
              <span>Nama</span>
              <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
              @if ($errors->has('name'))
                  <div class="text-danger">
                      <strong><small>{{ $errors->first('name') }}</small></strong>
                  </div>
              @endif<br>
              <span>Nomor Handphone</span>
              <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}">
              @if ($errors->has('phone'))
                  <div class="text-danger">
                      <strong><small>{{ $errors->first('phone') }}</small></strong>
                  </div>
              @endif<br>
              <span>Foto Profile</span>
              <input class="form-control" type="file" name="avatar">
              @if ($errors->has('avatar'))
                  <div class="text-danger">
                      <strong><small>{{ $errors->first('avatar') }}</small></strong>
                  </div>
              @endif<br>
              <input type="submit" value="Save" class="btn btn-success form-control" style="background-color:#5cb85c">
            </form>
          </div>

    		</div>
    	</div>
    </div>
@endsection
