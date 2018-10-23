@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-3">
            <div class="card striped-tabled-with-hover">
              <div class="card-body">
                <form action="/admin/posting/images/store" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <span>Add Image:</span><br>
                  <center><img id="blah" src="{{ asset('storage/postingan/no_image.png') }}" alt="your image" width="100px" height="100px" style="margin:2%"/></center>
                  <input type='file' id="imgInp" class="form-control" name="foto"/>
                  <input type="submit" value="Upload" class="form-control btn btn-success" style="margin-top: 4%">
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-9">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Link Image</h4>
                  </div>
                  <div class="card-body">

                    <table class="table table-hover table-striped" >
                      <thead>
                        <th>Image</th>
                        <th>Path</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <script src="dist/clipboard.min.js"></script>
                        @foreach($image as $data)
                        <tr>
                          <td><img height="100" width="150" src="{{ asset('storage/postingan/'.$data->name) }}"></td>
                          <td>
                            {{ $data->path }}
                          </td>
                          <td>
                            <a onclick="return confirm('Apakah kamu yakin akan menghapus item ini?');" class="btn btn-danger btn-fill" href="/admin/posting/image/destroy/{{ $data->id }}" style="margin-right: 2%"><li class="	fa fa-times"></li></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
