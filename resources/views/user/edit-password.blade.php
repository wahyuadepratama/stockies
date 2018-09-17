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
            <form action="/home/change-password/update" method="post">
              {{ csrf_field() }}
              <span>Password</span>
              <input class="form-control" type="password" name="password"><br>
              <span>Konfirmasi Password</span>
              <input class="form-control" type="password" name="password_confirmation">
              @if ($errors->has('password'))
                  <div class="text-danger">
                      <strong><small>{{ $errors->first('password') }}</small></strong>
                  </div>
              @endif<br>
              <input type="submit" value="Save" class="btn btn-danger form-control" style="background-color:#5cb85c">
            </form>
          </div>

    		</div>
    	</div>
    </div>
@endsection
