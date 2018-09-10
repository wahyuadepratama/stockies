@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                      <h4 class="card-title">Daftar Foto #{{$id_transaksi}}</h4><br>
                    </div>
                </div>
            </div>

            @foreach($data as $isi)
              @if($isi->ukuran == "small")
              <div class="col-md-4">
                  <div class="card strpied-tabled-with-hover">
                      <div class="card-body">
                        <div class="col-md-4" style="margin-bottom:2%;">
                          <p>Small</p>
                          <img width="260" height="180" src="{{asset('storage/original_photo/'.$isi->photo->small_ori)}}" alt="">
                        </div>
                      </div>
                  </div>
              </div>
              @endif

              @if($isi->ukuran == "medium")
              <div class="col-md-4">
                  <div class="card strpied-tabled-with-hover">
                      <div class="card-body">
                        <div class="col-md-4" style="margin-bottom:2%;">
                          <p>Medium</p>
                          <img width="260" height="180" src="{{asset('storage/original_photo/'.$isi->photo->medium_ori)}}" alt="">
                        </div>
                      </div>
                  </div>
              </div>
              @endif

              @if($isi->ukuran == "large")
              <div class="col-md-4">
                  <div class="card strpied-tabled-with-hover">
                      <div class="card-body">
                        <div class="col-md-4" style="margin-bottom:2%;">
                          <p>Large</p>
                          <img width="260" height="180" src="{{asset('storage/original_photo/'.$isi->photo->large_ori)}}" alt="">
                        </div>
                      </div>
                  </div>
              </div>
              @endif
            @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
