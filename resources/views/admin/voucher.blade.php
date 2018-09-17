@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Daftar Semua Voucher</h4>
                  </div>
                  <div class="card-body">

                    @include('admin.includes.js-datatable')

                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <th>Id</th>
                            <th>Discount</th>
                            <th>Code</th>
                            <th>Information</th>
                            <th>Dibuat</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                          @foreach($all as $isi)
                          <tr>
                            <td>{{$isi->id}}</td>
                            <td>{{$isi->percent_discount}}%</td>
                            <td>{{$isi->code}}</td>
                            <td>{{$isi->information}}</td>
                            <td>{{ \Carbon\Carbon::parse($isi->created_at)->format('d M Y / H:i:s')}}</td>
                            <td>
                              <form action="/admin/voucher/{{$isi->id}}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="Delete">
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

          <div class="col-md-8">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Buat Voucher</h4>
                  </div>
                  <div class="card-body">
                    <form action="/admin/voucher" method="post">
                      {{ csrf_field() }}
                      <input type="text" name="code" class="form-control" placeholder="Masukan Kode Disini"><br>
                      @if ($errors->has('code'))
                          <div class="text-danger">
                              <strong><small>{{ $errors->first('code') }}</small></strong>
                          </div>
                      @endif
                      <input type="number" name="discount" class="form-control" placeholder="Persentase Diskon (satuan %)"><br>
                      @if ($errors->has('discount'))
                          <div class="text-danger">
                              <strong><small>{{ $errors->first('discount') }}</small></strong>
                          </div>
                      @endif
                      <textarea name="information" rows="5" cols="10%" class="form-control" placeholder="Informasi Diskon"></textarea><br>
                      @if ($errors->has('information'))
                          <div class="text-danger">
                              <strong><small>{{ $errors->first('information') }}</small></strong>
                          </div>
                      @endif
                      <input type="submit" value="Buat Voucher" class="form-control btn btn-info btn-fill pull-right">
                    </form>
                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
