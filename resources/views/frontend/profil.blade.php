@extends('layouts.user')

@section('content')
<style type="text/css">
  .video{
    position: relative;
    padding-bottom: 50%;
  }
  .video iframe {
    position: absolute;
    width: 100%;
    height: 100%;
  }
  .image{
    position: relative;
    padding-bottom: 50%;
  }
  .image img {
    position: absolute;
    width: 100%;
    height: 100%;
  }
</style>
   <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-primary">
        <div class="container">
          
        </div>
      </div>
      
      <div class="container">
        <div class="card card-hero animated slideInUp animation-delay-8 mb-6">
          <div class="card-block">
            <div class="row">
            <div class="col-md-12">
            <h2 class="color-primary">Tentang Kami</h2>
                <p class="dropcaps">{!!$profil->profil!!}</p>
            </div>
            </div>
            <hr class="dotted">
            
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                <img src="{{asset('img/gedung.jpg')}}">
                </div>
              </div>
              <div class="col-lg-6 text-justify">
                <h2 class="color-primary" align="left">Visi Dan Misi</h2>
                <p align="right">{!!$profil->visi!!}</b></p>
                <p class="dropcaps">{!!$profil->misi!!}</p>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="card card-hero animated slideInUp animation-delay-8 mb-6">
          <div class="card-block">
            <div class="row">
            <div class="col-md-12">
              <div class="video">
              <iframe src="//www.youtube.com/embed/6dGD9WFqs6Y" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
            </div>
            <hr class="dotted">
          </div>
        </div>
      </div>
      <div class="container container-full">
        <h1 class="text-center">
          <span class="badge badge-primary">Sejarah</span>
        </h1>
        <section class="row timeline-center">
          @php
          $sejarah = App\Sejarah::all();
          @endphp
          @foreach($sejarah as $sej)
          @if($sej->id % 2 != 0)
          <div class="col-md-6">
            <article class="card card-danger timeline-center-item left wow slideInLeftTiny">
              <header class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-flag"></i> {{$sej->waktu}}</h3>
              </header>
              <div class="card-block">
                <h3 class="color-danger">{{$sej->judul}}</h3>
                <p>{{$sej->keterangan}}</p>
              </div>
            </article>
          </div>
          @else
          <div class="col-md-6">
            <article class="card card-success timeline-center-item right wow fadeInUp">
              <header class="card-header">
                <h3 class="card-title"> <i class="zmdi zmdi-flag"></i> {{$sej->waktu}}</h3>
              </header>
              <div class="withripple zoom-img">
                <a href="javascript:void(0);">
                  <img src="assets/img/demo/m1.jpg" alt="" class="img-fluid"> </a>
              </div>
              <div class="card-block">
                <h3 class="color-success">{{$sej->judul}}</h3>
                <p>{{$sej->keterangan}}</p>
              </div>
            </article>
          </div>
          @endif
          @endforeach
        </section>
      </div>
      <div class="wrap ms-hero-bg-dark-light ms-hero-img-airplane ms-bg-fixed mb-6 mt-4">
        <div class="container">
          <h2 class="text-center color-white no-mt mb-6 wow fadeInUp">Keunggulan SMK Assalaam</h2>
          <div class="row">
            @foreach($keunggulan as $data)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <p>{{$data->keunggulan}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection