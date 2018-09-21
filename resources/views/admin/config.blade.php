@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-4">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Landing Page 1</h4>
                  </div>
                  <div class="card-body">
                    <img src="{{asset('storage/landing/1.jpg')}}" height="170" width="295" class="img-responsive">
                    <form class="" action="/admin/config/landing/1" method="post" enctype="multipart/form-data" accept="image/*">
                      {{ csrf_field() }}
                      <input type="file" name="image" value="" style="margin-top:2%" class="btn form-control">
                      <input type="submit" name="" value="Change" class="btn btn-danger form-control" style="margin-top:2%">
                      @if ($errors->has('image'))
                          <div class="text-danger">
                              <strong><small>{{ $errors->first('image') }}</small></strong>
                          </div>
                      @endif
                    </form>
                  </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Landing Page 2</h4>
                  </div>
                  <div class="card-body">
                    <img src="{{asset('storage/landing/2.jpg')}}" height="170" width="295" class="img-responsive">
                    <form class="" action="/admin/config/landing/2" method="post" enctype="multipart/form-data" accept="image/*">
                      {{ csrf_field() }}
                      <input type="file" name="image" value="" style="margin-top:2%" class="btn form-control">
                      <input type="submit" name="" value="Change" class="btn btn-danger form-control" style="margin-top:2%">
                      @if ($errors->has('image'))
                          <div class="text-danger">
                              <strong><small>{{ $errors->first('image') }}</small></strong>
                          </div>
                      @endif
                    </form>
                  </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Landing Page 3</h4>
                  </div>
                  <div class="card-body">
                    <img src="{{asset('storage/landing/3.jpg')}}" height="170" width="295" class="img-responsive">
                    <form class="" action="/admin/config/landing/3" method="post" enctype="multipart/form-data" accept="image/*">
                      {{ csrf_field() }}
                      <input type="file" name="image" value="" style="margin-top:2%" class="btn form-control">
                      <input type="submit" name="" value="Change" class="btn btn-danger form-control" style="margin-top:2%">
                      @if ($errors->has('image'))
                          <div class="text-danger">
                              <strong><small>{{ $errors->first('image') }}</small></strong>
                          </div>
                      @endif
                    </form>
                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
