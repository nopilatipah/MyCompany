@extends('layouts.user')

@section('navbar')
			<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Beranda</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">Sekolah <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/profil')}}">Profil Umum</a></li>
                    <li><a href="{{url('/kejuruan')}}">Kejuruan</a></li>
                    <li><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
                    <li><a href="{{url('/ekstrakurikuler')}}">Ekstrakurikuler</a></li>
                    <li><a href="{{url('/prestasi')}}">Prestasi</a></li>
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
    <!-- Section: intro -->
    <section id="intro" class="intro">
        <div class="intro-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="well well-trans">
                    <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                    <h2 class="h-ultra">{{$komponen->nama_sekolah}}</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                    <h4 class="h-light">{{$komponen->deskripsi}}</h4>
                    </div>
                    </div>
                        <div class="well well-trans">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">

                        <ul class="lead-list">
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Lokasi {{$komponen->nama_sekolah}}</strong><br />{{$lokasi->lokasi}}</span></li>
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Visi {{$komponen->nama_sekolah}}</strong><br />{!!$sambutan->visi!!}</span></li>
                        </ul>
                        <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                        <a href="{{ url('/profil') }}" class="btn btn-skin btn-lg">Pelajari Selengkapnya <i class="fa fa-angle-right"></i></a>
                        </p>
                        </div>
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <center>
                        <img src="{{ asset('img/'.$komponen->foto_utama) }}" class="img-responsive" alt=""/>
                        </center>
                        </div>
                    </div>                  
                </div>      
            </div>
        </div>      
    </section>
    
    <!-- /Section: intro -->

    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">

        <div class="row">
            <div class="col-sm-5">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{ asset('img/'.$sambutan->foto) }}" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">Sambutan Kepala Sekolah</h2>
                    </div>
                    <hr>
                    <p align="justify">{!!$sambutan->sambutan!!}</p>
                </div>
            </div>
            
        </div>      
        </div>
    </section>
    <!-- /Section: services -->
    
    
    <!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">
        <div class="carousel-reviews broun-block">
            <div class="container">
                <div class="row">
                    <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
                    
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#">Emergency Contraception</a>
                                        
                                        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div>
                                    <div class="person-text rel text-light">                    
                                        <img src="{{ asset('/Frontend/Medicio/img/testimonials/1.jpg') }}" alt="" class="person img-circle" />
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#">Emergency Contraception</a>
                                        
                                        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div>
                                    <div class="person-text rel text-light">                    
                                        <img src="{{ asset('/Frontend/Medicio/img/testimonials/1.jpg') }}" alt="" class="person img-circle" />
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#">Emergency Contraception</a>
                                        
                                        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div>
                                    <div class="person-text rel text-light">                    
                                        <img src="{{ asset('/Frontend/Medicio/img/testimonials/1.jpg') }}" alt="" class="person img-circle" />
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>
                                
                            </div>
                            
                           
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section: testimonial -->
    
    <section id="nnn" class="home-section paddingbot-60">   
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                    <h2 class="h-bold">Kerjasama Perusahaan</h2>
                    <p>Perusahaan Yang Bekerja Sama Dengan SMK Assalaam Bandung</p>
                    </div>
                    </div>
                    <div class="divider-short"></div>
                </div>
            </div>
        </div>
        
           <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
                    <div>
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><a href="{{ asset('img/default.png') }}" title="Gambar Perusahaan" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="{{ asset('img/logo1.png') }}" class="img-responsive" alt="img"></a></div>
                        <div class="item"><a href="{{ asset('img/logo1.png') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="{{ asset('img/logo2.png') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('img/logo2.png') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="{{ asset('img/logo3.png') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('img/logo3.png') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="{{ asset('img/logo4.png') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('img/logo4.png') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="{{ asset('Frontend/Medicio/img/photo/5.jpg') }}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{ asset('Frontend/Medicio/img/photo/6.jpg') }}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="{{ asset('img/honda.png') }}" class="img-responsive " alt="img"></a></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection