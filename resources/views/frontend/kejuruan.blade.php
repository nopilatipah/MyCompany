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
                    <li class="active"><a href="{{url('/kejuruan')}}">Kejuruan</a></li>
                    <li><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
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

<br><br><br><br><br><br>
@foreach($kejuruan as $data)
        
    <section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">

        <div class="row">
            <div class="col-sm-5">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{ asset('img/'.$data->siswa) }}" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">{{$data->nama}}</h2>
                    </div>
                    <hr>
                    <p align="justify">{!!$data->profil!!}</p>
                    <h3>Program Pembelajaran</h3>
                    <p>{!!$data->program!!}</p>
                </div>
                
            </div>
            
        </div>
        <hr>      
        </div>
    </section>
@endforeach
<section id="service" class="home-section nopadding paddingtop-60">
<br>       
</section>
@endsection