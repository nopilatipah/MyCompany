@extends('layouts.user')

@section('navbar')
			<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Beranda</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">Sekolah <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="active"><a href="{{url('/profil')}}">Profil Umum</a></li>
                    <li><a href="{{url('/kejuruan')}}">Kejuruan</a></li>
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
   <br><br><br><br><br>
    <section id="boxes" class="home-section paddingtop-80">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">
                            
                            <i class="fa fa-check fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">Terakreditasi</h4>
                            <h3 class="h-bold">" {{$komponen->akreditasi}} "</h3>
                
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">
                            
                            <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">Visi Sekolah</h4>
                            <p>
                            {!!$profil->visi!!}
                            
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">
                            <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">Lokasi Sekolah</h4>
                            <p>
                            {{$lokasi->lokasi}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">
                            
                            <img src="{{asset('img/ms2.png')}}" class="img img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Section: boxes -->
    
    
    <section id="callaction" class="home-section paddingtop-40">    
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="cta-text">
                                    <h3>Profil Umum {{$komponen->nama_sekolah}}</h3>
                                    <p class="justify">{!!$profil->profil!!}</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>  
    

    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">

        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{asset('img/ms5.png')}}" class="img img-responsive">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
             <p>
                 {!!$profil->sejarah!!}
             </p>
             </div>
             <div class="wow fadeInUp" data-wow-delay="0.2s">
                <h5><b>Misi {{$komponen->nama_sekolah}}</b></h5>
                <p>{!!$profil->misi!!}</p>
                </div>
            </div>
            
        </div>   

         
        </div>
    </section>
    <!-- /Section: services -->
    

   
    
    
    
@endsection