@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="alert alert-success">
                        <p>
                            Selamat Datang User, your token: {{Auth::user()->remember_token}}
                            @php
                                $check = Auth::id();
                            @endphp
                            @if ($check)
                                <button type="button" id="upgrade" class="btn btn-xs btn-info" data-id="{{ Auth::id() }}" data-member="member">upgrade</button>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="alert alert-success">
                        Upload Images
                    </div>

                    <form class="" action="/photo/store" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      Nama <input type="text" name="name" value="">
                      <select name="category">
                        <option value="0">Pilih Kategori</option>
                        @foreach($category as $isi)
                        <option value="{{$isi->id}}">{{$isi->nama}}</option>
                        @endforeach
                      </select>

                      <input type="file" name="image" value="Foto">
                      <input type="submit" value="Upload">
                      @foreach($keyword as $isi1)
                        <input type="checkbox" name="keyword[]" value="{{$isi1->id}}">{{$isi1->nama}}
                      @endforeach
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection
