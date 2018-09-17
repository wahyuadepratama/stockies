@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Daftar Semua Komentar</h4>
                  </div>
                  <div class="card-body">

                    @include('admin.includes.js-datatable')

                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <th>Id</th>
                            <th>Body</th>
                            <th>Pemilik</th>
                            <th>Waktu</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                          @foreach($all as $isi)
                          <tr>
                            <td>{{$isi->id}}</td>
                            <td>{{$isi->body}}</td>
                            <td>{{$isi->user->username}}</td>
                            <td>{{ \Carbon\Carbon::parse($isi->created_at)->format('d M Y / H:i:s')}}</td>
                            <td>
                              <form class="" action="/admin/comment/{{$isi->id}}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" name="" value="Delete">
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

                    <script type="text/javascript">
                      $(document).ready( function () {
                        $('#dataTable').DataTable();
                      } );
                    </script>

                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
