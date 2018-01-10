@extends('layouts.user')

@section('navbar')

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Beranda</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">Sekolah <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/profil')}}">Profil Umum</a></li>
                    <li><a href="{{url('/kejuruan')}}">Kejuruan</a></li>
                    <li class="active"><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
                    <li><a href="{{url('/ekstrakurikuler')}}">Ekstrakurikuler</a></li>
                  </ul>
                </li>
                <li><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/galeri')}}">Galeri</a></li>
                <li><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
@endsection

@section('content')

<section id="facilities" class="home-section paddingbot-60">
<div class="container">
<div class="wow lightSpeedIn" data-wow-delay="0.1s">
  <div class="section-heading text-center">
    <h2 class="h-bold">Galeri SMK Assalaam Bandung <b></b></h2>
    <p>Instagram : <i>@SMKASSALAAM</i></p>
  </div>
</div>
<div class="divider-short"></div><br>
<div id="instafeed" class="row"></div>
</div>
</section>

@endsection