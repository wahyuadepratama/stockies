@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
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
                          @foreach($category as $isi)
                          <option value="{{$isi->id}}">{{$isi->nama}}</option>
                          @endforeach
                        </select>

                        <select name="user" class="form-control" style="margin-bottom:2%;">
                          <option value="0">Pilih Pemilik</option>
                          @foreach($user as $isi1)
                          <option value="{{$isi->id}}">{{$isi1->username}}</option>
                          @endforeach
                        </select>

                        <input type="file" name="image" value="Foto" class="form-control" style="margin-bottom:2%;">
                        <div class="col-md-3">
                          Keyword:
                        </div>
                        <div class="col-md-12">
                        @foreach($keyword as $isi1)
                          <input type="checkbox" name="keyword[]" value="{{$isi1->id}}"> {{$isi1->nama}}</input>&nbsp;
                        @endforeach
                        </div>

                        <br><input type="number" name="price_small" class="form-control" placeholder="Harga Ukuran Small"/>
                        <input type="number" name="price_medium" class="form-control" placeholder="Harga Ukuran Medium" style="margin-top:2%;"/>
                        <input type="number" name="price_large" class="form-control" placeholder="Harga Ukuran Large" style="margin-top:2%;"/>

                        <input type="submit" value="Upload" class="form-control btn btn-fill" style="margin-top:2%;">
                      </form>

                      <!-- <div class="card-body table-full-width table-responsive">
                          <table class="table table-hover table-striped">
                              <thead>
                                  <th>No</th>
                                  <th>Nama</th>
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
                      </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
