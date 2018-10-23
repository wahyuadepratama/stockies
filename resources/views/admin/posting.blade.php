@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-body">
                      <a class="btn btn-info btn-fill" href="/admin/posting/create">Buat Postingan</a>
                  </div>
              </div>
          </div>

          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Daftar Postingan</h4>
                  </div>
                  <div class="card-body">

                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
                    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
                    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>

                    <table class="table table-hover table-striped" id="dataTable">
                      <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Diupdate</th>
                        <th>Pemilik</th>
                        <th>Kategori</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @php $x=1 @endphp
                        @foreach($posting as $data)
                        <tr>
                          <td>{{ $x }}</td>
                          <td>{{ $data->judul }}</td>
                          <td>{{ $data->updated_at }}</td>
                          <td>{{ $data->user->name }}</td>
                          <td>{{ $data->kategoriPosting->nama }}</td>
                          <td>
                            <a onclick="return confirm('Apakah kamu yakin akan menghapus item ini?');" class="btn btn-danger btn-fill" href="/admin/posting/destroy/{{ $data->id }}" style="margin-right: 2%"><li class="	fa fa-times"></li></a>
                            <a class="btn btn-info btn-fill" href="/admin/posting/update/{{ $data->id }}"><li class="	fa fa-pencil-square-o"></li></a>
                          </td>
                        </tr>
                          @php $x++ @endphp
                        @endforeach
                      </tbody>

                      <script type="text/javascript">
                        $(document).ready( function () {
                          $('#dataTable').DataTable();
                        } );
                      </script>

                    </table>
                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
