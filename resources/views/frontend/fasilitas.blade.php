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

    
        
    <!-- Section: works -->
    <section id="facilities" class="home-section paddingbot-60">
    <br>
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">Fasilitas SMK Assalaam Bandung</h2>
                    </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
                    <div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/1.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/1.jpg') }}" class="img-responsive" alt="img"></a></div>
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/2.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/2.jpg') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/3.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/3.jpg') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/4.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/4.jpg') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/5.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/5.jpg') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/6.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/6.jpg') }}" class="img-responsive " alt="img"></a></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section: works -->
@endsection