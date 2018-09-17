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
                                <a class="btn btn-success" data-toggle="modal" data-target="#selesai{{$isi->id_transaksi}}" href="selesai{{$isi->id_transaksi}}">Selesai</a>
                              @endif
                            </td>
                            <td>
                              <p><a class="text-danger" data-toggle="modal" data-target="#delete{{$isi->id_transaksi}}" href="delete{{$isi->id_transaksi}}">Delete</a></p>
                            </td>

                            <div class="modal fade modal modal-primary" id="bukti{{$isi->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <p>Total: Rp. {{$isi->total}}</p>
                                        <img width="300" height="240" src="{{asset('storage/pembayaran/'.$isi->bank)}}">
                                        <p>
                                          <a class="btn btn-success" style="margin-top:2%" href="/admin/transaction/approve/{{$isi->id_transaksi}}">Approve</a>
                                          <a class="btn btn-danger" style="margin-top:2%" href="/admin/transaction/reject/{{$isi->id_transaksi}}">Reject</a>
                                        </p>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal modal-primary" id="selesai{{$isi->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <p>Total: Rp. {{$isi->total}}</p>
                                        <img width="300" height="240" src="{{asset('storage/pembayaran/'.$isi->bank)}}">
                                        <p><a class="btn btn-danger" style="margin-top:2%" href="/admin/transaction/refuse/{{$isi->id_transaksi}}">Refuse</a></p>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal modal-primary" id="delete{{$isi->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header justify-content-center">
                                          <div class="modal-profile">
                                              <i class="nc-icon nc-bulb-63"></i>
                                          </div>
                                      </div>
                                      <div class="modal-body text-center">
                                          <p>Apakah anda yakin akan menghapus Transaksi ini? Semua <b>Cart</b> yang menggunakan transaksi ini juga akan ikut terhapus!</p>
                                      </div>
                                      <div class="modal-footer">
                                        <form action="/admin/transaction/delete/{{$isi->id_transaksi}}" method="post">
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
