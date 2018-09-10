@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Daftar Semua Transaksi</h4>
                  </div>
                  <div class="card-body">

                    @include('admin.includes.js-datatable')

                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <th>Id</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Cart</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Bukti</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                          @foreach($all as $isi)
                          <tr>
                            <td>{{$isi->id_transaksi}}</td>
                            <td>{{$isi->status}}</td>
                            <td>{{ \Carbon\Carbon::parse($isi->waktu)->format('d M Y / H:i:s')}}</td>
                            <td><a href="/admin/transaction/cart/{{$isi->id_transaksi}}">Show</a></td>
                            <td>{{$isi->username}}</td>
                            <td>{{$isi->penerima}}</td>
                            <td>
                              @if($isi->status == "waiting")
                                <p>Belum di Upload</p>
                              @endif
                              @if($isi->status == "paid")
                                <a class="btn btn-primary" data-toggle="modal" data-target="#bukti{{$isi->id_transaksi}}" href="bukti{{$isi->id_transaksi}}">Show</a>
                              @endif
                              @if($isi->status == "approved")
                                <p>Selesai</p>
                              @endif
                            </td>
                            <td>
                              <p><a class="text-danger" data-toggle="modal" data-target="#delete{{$isi->id}}" href="delete{{$isi->id}}">Delete</a></p>
                            </td>

                            <div class="modal fade modal modal-primary" id="cart{{$isi->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      @foreach($all as $isi1)
                                      <div class="modal-body text-center">
                                        <p>Ukuran: {{$isi1->ukuran}}</p>
                                        <p>Harga: {{$isi1->price}}</p>
                                        <img width="300" height="240" src="{{asset('storage/photo/'.$isi1->path)}}">
                                      </div>
                                      @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal modal-primary" id="bukti{{$isi->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <p>Total: Rp. {{$isi->total}}</p>
                                        <img width="300" height="240" src="{{asset('storage/pembayaran/'.$isi->bank)}}">
                                        <p><a class="btn btn-success" style="margin-top:2%" href="/admin/transaction/approve/{{$isi->id_transaksi}}">Approve</a></p>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal modal-primary" id="delete{{$isi->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header justify-content-center">
                                          <div class="modal-profile">
                                              <i class="nc-icon nc-bulb-63"></i>
                                          </div>
                                      </div>
                                      <div class="modal-body text-center">
                                          <p>Apakah anda yakin akan menghapus foto ini?</p>
                                      </div>
                                      <div class="modal-footer">
                                        <form action="/admin/photo-management/delete/{{$isi->id}}" method="post">
                                          <button type="submit" class="btn btn-link btn-simple">Ya</button>
                                          <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                                          {{csrf_field()}}
                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </div>

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
