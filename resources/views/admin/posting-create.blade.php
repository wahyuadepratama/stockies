@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Buat Postingan Baru</h4>
                  </div>
                  <div class="card-body">

                    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>

                    <form action="/admin/posting/store" method="post" id="form1" runat="server" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="text" name="judul" placeholder="Write Your Title Here" class="form-control" style="margin-bottom: 2%" required>
                      <textarea class="form-control" name="postingan" required></textarea>

                      <div class="row">
                        <div class="col-md-8">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-body">
                                  <div class="col-md-12">

                                    <span>Link Image:</span>
                                    <a class="form-control btn btn-fill btn-default" target="_blank" rel="noopener noreferrer" href="/admin/posting/images" style="margin-bottom:2%; margin-top:2%">Show All Images</a>

                                    <span>Kategori:</span>
                                    <select name="category" class="form-control" style="margin-bottom:2%; margin-top:2%;">
                                      <option value="0">Pilih Kategori</option>
                                      @foreach($category as $isi1)
                                      <option value="{{$isi1->id}}">{{$isi1->nama}}</option>
                                      @endforeach
                                    </select>

                                  </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info btn-fill" value="Publish">
                        </div>
                        <div class="col-md-4">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-body">
                                  <div class="col-md-12">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <span>Feature Image:</span><br>
                                    <img id="blah" src="{{ asset('storage/postingan/no_image.png') }}" alt="your image" width="100px" height="100px" style="margin:2%"/>
                                    <input type='file' id="imgInp" class="form-control" name="foto"/>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>

                    </form>

                		<script>
                			CKEDITOR.replace( 'postingan' );
                		</script>

                    <script type="text/javascript">
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                          var reader = new FileReader();

                          reader.onload = function(e) {
                            $('#blah').attr('src', e.target.result);
                          }

                          reader.readAsDataURL(input.files[0]);
                        }
                      }

                      $("#imgInp").change(function() {
                      readURL(this);
                      });
                    </script>

                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
