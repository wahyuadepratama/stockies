<div id="fh5co-started">
  <div class="container gallery">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2>Temukan foto yang kamu butuhkan.</h2>
        <!-- <p>Just stay tune for our latest Product. Now you can subscribe</p> -->
      </div>
    </div>
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2">
        <form action="/katalog/search" method="post">
          {{csrf_field()}}
          <div class="col-md-9 col-sm-9 search">
            <div class="form-group">
              <label for="text" class="sr-only"><i>Masukkan kata kunci</i></label>
              <input name="search" type="text" class="form-control" id="text" placeholder="Masukkan kata kunci">
            </div>
          </div>
          <div class="col-md-3 col-sm-2">
            <button type="submit" class="btn btn-default btn-block">Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
