@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                      <h4 class="card-title">Daftar Foto</h4>
                    </div>
                    <div class="card-body">
                      @foreach($data as $isi)
                        @if($isi->ukuran == "small")
                        <div class="col-md-12" style="margin-bottom:2%;">
                          <p>Small</p>
                          <img width="320" height="240" src="{{asset('storage/original_photo/'.$isi->photo->small_ori)}}" alt="">
                        </div>
                        @endif

                        @if($isi->ukuran == "medium")
                        <div class="col-md-12" style="margin-bottom:2%;">
                          <p>Medium</p>
                          <img width="320" height="240" src="{{asset('storage/original_photo/'.$isi->photo->medium_ori)}}" alt="">
                        </div>
                        @endif

                        @if($isi->ukuran == "large")
                        <div class="col-md-4" style="margin-bottom:2%;">
                          <p>Large</p>
                          <img width="320" height="240" src="{{asset('storage/original_photo/'.$isi->photo->large_ori)}}" alt="">
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
