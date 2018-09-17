@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Kirim Pesan</h4>
                    </div>
                    <div class="card-body">
                      <form action="/admin/message/send" method="post">
                        {{ csrf_field() }}
                        <textarea name="body" rows="5" cols="10%" class="form-control" placeholder="Tulis Pesan anda disini"></textarea><br>
                        @if ($errors->has('body'))
                            <div class="text-danger">
                                <strong><small>{{ $errors->first('body') }}</small></strong>
                            </div>
                        @endif
                        <select name="user" class="form-control" style="margin-bottom:2%;">
                          <option value="0">Pilih Tujuan</option>
                          @foreach($user as $user)
                          <option value="{{$user->id}}">{{$user->username}}</option>
                          @endforeach
                        </select>
                        <input type="submit" value="Kirim Pesan" class="form-control btn btn-info btn-fill pull-right">
                      </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
