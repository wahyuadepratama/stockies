@extends('guest.master')

@section('content')

  <div id="fh5co-about">
    <div class="container">
      <div class="about-content">
        <div class="row animate-box">
          <div class="row">

            <div class="col-md-8 animate-box">
              @foreach($all as $isi)
              <div class="media animate-box" style="background-color: #ede0c53d; border-radius: 2em 0;">
                <div class="media-left" style="padding: 3%">
                  <a href="#">
                    <img class="media-object" src="{{ asset('storage/postingan/'.$isi->foto) }}" alt="..." width="150" height="150" style="border-color: #ede0c53d">
                  </a>
                </div>
                <div class="media-body" style="padding: 3%">
                  <h3 class="media-heading">{{ $isi->judul }}</h3>
                  <p>
                    <table>
                      <tr>
                        <td> Posted By </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td> {{ $isi->user->name }} </td>
                      </tr>
                      <tr>
                        <td> Published </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td> {{ \Carbon\Carbon::parse($isi->updated_at)->format('d M Y / H:i:s')}} </td>
                      </tr>
                      <tr>
                        <td> Kategori </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td> {{ $isi->kategoriPosting->nama }} </td>
                      </tr>
                    </table>
                  </p>
                  <a href="/blog/{{ $isi->slug }}" class="btn btn-warning" style="background-color: #bf8b16; border-color: #bf8b16">Read More</a>
                </div>
              </div>
              @endforeach
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-3">
              Kategori Artikel<br><br>
              @foreach($kategori as $data)
              <li> <a href="/blog/{{ $data->nama }}"> {{ $data->nama }} </a> </li>
              @endforeach
            </div>

            <div class="col-md-12">
              {{ $all->links() }}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
