@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Keywords</h4>
                        <p class="card-category">Daftar keyword yang tersedia</p>
                    </div>
                    <div class="card-body">
                      <form action="/admin/keyword/store" method="post">
                        {{csrf_field()}}
                        <input type="text" name="keyword" class="form-control">
                        <input type="submit" name="" value="Tambah" class="form-control btn btn-info btn-fill pull-right" style="margin-top:2%">
                      </form>
                      <div class="card-body table-full-width table-responsive">
                          <table class="table table-hover table-striped">
                              <thead>
                                  <th>No</th>
                                  <th>Nama Keyword</th>
                                  <th>Action</th>

                              </thead>
                              <tbody>
                                @php $x=1 @endphp
                                @foreach($keyword as $data1)
                                  <tr>
                                      <td>{{$x}}</td>
                                      <td>{{$data1->nama}}</td>
                                      <td>

                                        <a class="btn btn-danger btn-fill" data-toggle="modal" data-target="#delete{{$data1->id}}" href="#delete{{$data1->id}}"><li class="fa fa-times"></li></a>&nbsp;

                                        <div class="modal fade modal modal-primary" id="delete{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header justify-content-center">
                                                      <div class="modal-profile">
                                                          <i class="nc-icon nc-bulb-63"></i>
                                                      </div>
                                                  </div>
                                                  <div class="modal-body text-center">
                                                      <p>Apakah anda yakin item ini akan dihapus?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <form action="/admin/keyword/delete/{{$data1->id}}" method="post">
                                                      <button type="submit" class="btn btn-link btn-simple">Ya</button>
                                                      <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                                                      {{csrf_field()}}
                                                    </form>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                      </td>
                                  </tr>
                                  @php $x++ @endphp
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Kategori</h4>
                        <p class="card-category">Daftar kategori yang tersedia</p>
                    </div>
                    <div class="card-body">
                      <form action="/admin/kategori/store" method="post">
                        {{csrf_field()}}
                        <input type="text" name="kategori" class="form-control">
                        <input type="submit" name="" value="Tambah" class="form-control btn btn-info btn-fill pull-right" style="margin-top:2%">
                      </form>
                      <div class="card-body table-full-width table-responsive">
                          <table class="table table-hover table-striped">
                              <thead>
                                  <th>No</th>
                                  <th>Nama Kategori</th>
                                  <th>Action</th>

                              </thead>
                              <tbody>
                                @php $y=1 @endphp
                                @foreach($kategori as $data)
                                  <tr>
                                      <td>{{$y}}</td>
                                      <td>{{$data->nama}}</td>
                                      <td>

                                        <a class="btn btn-danger btn-fill" data-toggle="modal" data-target="#delete{{$data->id}}" href="#delete{{$data->id}}"><li class="fa fa-times"></li></a>&nbsp;

                                        <div class="modal fade modal modal-primary" id="delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header justify-content-center">
                                                      <div class="modal-profile">
                                                          <i class="nc-icon nc-bulb-63"></i>
                                                      </div>
                                                  </div>
                                                  <div class="modal-body text-center">
                                                      <p>Apakah anda yakin item ini akan dihapus?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <form action="/admin/kategori/delete/{{$data->id}}" method="post">
                                                      <button type="submit" class="btn btn-link btn-simple">Ya</button>
                                                      <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                                                      {{csrf_field()}}
                                                    </form>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                      </td>
                                  </tr>
                                  @php $y++ @endphp
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
