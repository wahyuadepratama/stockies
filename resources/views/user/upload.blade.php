@extends('guest.master')

@section('content')

<aside id="fh5co-hero" class="">
  <div class="flexslider upload_foto">
    <ul class="slides">
      <li style="background-image: url({{asset('storage/landing/3.jpg')}});">
        <div class="overlay-gradient"></div>
      <div class="container">
          <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
            <div class="slider-text-inner">
              <div class="desc">
                <span class="price"></span>
                <h3 style="color:white; font-size:300%;font-weight:bold;">Dapatkan Penghasilan dari Karya Fotomu</h3>
              </div>
            </div>
          </div>
        </div>

      </li>
      </ul>
    </div>
</aside>

<div class="container upload_foto">
  <div class="col-md-6 animate-box ">
    <div class="text">
        <p>Suka memotret? Memiliki ratusan bahkan ribuan stok foto yang menumpuk di media penyimpanan ?</p>

        <p>Hasilkan uang dari fotomu dengan mengisi</p>

    </div>

    <div class="form_upload">
      <div class="col-md-12">
          <div class="card strpied-tabled-with-hover">
              <div class="card-body">
                <form class="" action="/photo/store" method="post" enctype="multipart/form-data" accept="image/*">
                  {{ csrf_field() }}

                  <input type="text" name="name" value="" class="form-control" placeholder="Judul" style="margin-bottom:2%;" required>
                  @if ($errors->has('name'))
                      <div class="text-danger">
                          <strong><small>{{ $errors->first('name') }}</small></strong>
                      </div>
                  @endif

                  <select name="category" class="form-control" style="margin-bottom:2%;" required>
                    <option value="0">Pilih Kategori</option>
                    @foreach($category as $isi1)
                    <option value="{{$isi1->id}}">{{$isi1->nama}}</option>
                    @endforeach
                  </select>

                  <input type="file" name="image" class="form-control" style="margin-bottom:2%;" required>
                  @if ($errors->has('image'))
                      <div class="text-danger">
                          <strong><small>{{ $errors->first('image') }}</small></strong>
                      </div>
                  @endif

                  <div class="col-md-4">
                    Keyword:
                  </div>
                  <div class="col-md-12" style="margin-bottom:5%;">
                  @foreach($keyword as $isi3)
                    <input type="checkbox" name="keyword[]" value="{{$isi3->id}}"> {{$isi3->nama}}</input>&nbsp;
                  @endforeach
                  </div>

                  <input type="submit" id="saveButton" value="Upload" class="form-control btn" style="margin-top:2%; background-color:#bf8b16; color:white">
                </form>

                <div class="modal fade" id="progressDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-body">
                             <p>Please wait while we update your topic. You will be redirected automatically!</p>

                             <div class="progress progress-striped active">
                                 <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                     <span class="sr-only">/span>
                                 </div>
                             </div>
                         </div>
                     </div><!-- /.modal-content -->
                 </div><!-- /.modal-dialog -->
             </div><!-- /.modal -->

                <div id="status"></div>

                <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
                <script src="http://malsup.github.com/jquery.form.js"></script> -->

                <script type="text/javascript">
                $("#saveButton").click(function() {
             $('#progressDialog').modal('show');

             var updateForm =document.querySelector('form');
             var request = new XMLHttpRequest();

             request.upload.addEventListener('progress', function(e){
                var percent = Math.round((e.loaded / e.total) * 100);

                 $('.progress-bar').css('width', percent+'%');
                 $('.sr-only').html(percent+'%');


             }, false);

             request.addEventListener('load', function(e){
                var jsonResponse = JSON.parse(e.target.responseText);
                 if(jsonResponse.errors) {
                     console.log(jsonResponse.errors);
                 }
                 else {
                         $('#progressDialog').modal('hide');
                 }
             }, false);

             updateForm.addEventListener('submit', function(e){
                 e.preventDefault();
                 var formData = new FormData(updateForm);
                 request.open('post',updateForm['action']);
                 request.send(formData);
             }, false);
         });
                </script>

              </div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
