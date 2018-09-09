@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-8">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Daftar Foto yang Belum di Publish</h4>
                  </div>
                  <div class="card-body">

                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
                    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
                    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
                    <!-- just for datatable -->

                    <table id="dataTable" class="table table-hover table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Pemilik</th>
                            <th>Photo</th>
                            <th>Harga</th>
                            <th>Publish</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                          @foreach($photo as $isi)
                          <tr>
                            <td>{{$isi->id}}</td>
                            <td>{{$isi->user->name}}</td>
                            <td>
                              <a data-toggle="modal" data-target="#1{{$isi->id}}" href="1{{$isi->id}}">Show</a>
                            </td>
                            <td>
                              <a data-toggle="modal" data-target="#harga{{$isi->id}}" href="harga{{$isi->id}}">Price</a>
                            </td>
                            <td> <a class="text-success" href="/admin/photo-management/approve/{{$isi->id}}">Approve</a> </td>
                            <td> <a class="text-danger" data-toggle="modal" data-target="#delete{{$isi->id}}" href="delete{{$isi->id}}">Delete</a> </td>

                            <div class="modal fade modal modal-primary" id="1{{$isi->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <img src="{{asset('storage/photo/'.$isi->thumbnail)}}">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal modal-primary" id="harga{{$isi->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <p>Small: Rp.{{$isi->price_small}}</p>
                                        <p>Medium: Rp.{{$isi->price_medium}}</p>
                                        <p>Large: Rp.{{$isi->price_large}}</p>
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

          <div class="col-md-4">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Tambah Photo</h4>
                  </div>
                  <div class="card-body">
                    <form class="" action="/photo/store" method="post" enctype="multipart/form-data" accept="image/*">
                      {{ csrf_field() }}

                      <input type="text" name="name" value="" class="form-control" placeholder="Judul" style="margin-bottom:2%;">

                      <select name="category" class="form-control" style="margin-bottom:2%;">
                        <option value="0">Pilih Kategori</option>
                        @foreach($category as $isi1)
                        <option value="{{$isi1->id}}">{{$isi1->nama}}</option>
                        @endforeach
                      </select>

                      <select name="user" class="form-control" style="margin-bottom:2%;">
                        <option value="0">Pilih Pemilik</option>
                        @foreach($user as $isi2)
                        <option value="{{$isi2->id}}">{{$isi2->username}}</option>
                        @endforeach
                      </select>

                      <input type="file" name="image" value="Foto" class="form-control" style="margin-bottom:2%;">
                      <div class="col-md-4">
                        Keyword:
                      </div>
                      <div class="col-md-12">
                      @foreach($keyword as $isi3)
                        <input type="checkbox" name="keyword[]" value="{{$isi3->id}}"> {{$isi3->nama}}</input>&nbsp;
                      @endforeach
                      </div>

                      <br><input type="number" name="price_small" class="form-control" placeholder="Harga Ukuran Small"/>
                      <input type="number" name="price_medium" class="form-control" placeholder="Harga Ukuran Medium" style="margin-top:2%;"/>
                      <input type="number" name="price_large" class="form-control" placeholder="Harga Ukuran Large" style="margin-top:2%;"/>

                      <input type="submit" value="Upload" class="form-control btn btn-fill" style="margin-top:2%;">
                    </form>

                  </div>
              </div>
            </div>

            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Foto yang Telah di Publish</h4>
                    </div>
                    <div class="card-body">
                      <table id="dataTable" class="table table-hover table-striped">
                        <thead>
                          <th>Id</th>
                          <th>Judul</th>
                          <th>Pemilik</th>
                          <th>Photo</th>
                          <th>Harga</th>
                          <th>Pembatalan</th>
                        </thead>
                        <tbody>
                          @foreach($publish as $isi4)
                          <tr>
                            <td>{{$isi4->id}}</td>
                            <td>{{$isi4->nama}}</td>
                            <td>{{$isi4->user->username}}</td>
                            <td><a data-toggle="modal" data-target="#2{{$isi4->id}}" href="2{{$isi4->id}}">Show</a></td>
                            <td><a data-toggle="modal" data-target="#3{{$isi4->id}}" href="3{{$isi4->id}}">Show Price</a></td>
                            <td><a class="text-danger" href="/admin/photo-management/refuse/{{$isi4->id}}">Refuse</a></td>
                            <div class="modal fade modal modal-primary" id="2{{$isi4->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <img src="{{asset('storage/photo/'.$isi4->thumbnail)}}">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade modal modal-primary" id="3{{$isi4->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body text-center">
                                        <p>Small: Rp.{{$isi4->price_small}}</p>
                                        <p>Medium: Rp.{{$isi4->price_medium}}</p>
                                        <p>Large: Rp.{{$isi4->price_large}}</p>
                                      </div>
                                    </div>
                                </div>
                            </div>
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
