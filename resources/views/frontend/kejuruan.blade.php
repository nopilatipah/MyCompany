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
                    <li><a href="{{url('/prestasi')}}">Prestasi</a></li>
                  </ul>
                </li>
                <li><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
@endsection

@section('content')
    

    <!-- Section: team -->
    <section id="doctor" class="home-section paddingbot-60">
    <br>
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">Kejuruan SMK Assalaam Bandung</h2>
                    </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
            <div id="grid-container" class="cbp-l-grid-team">
                <ul>
                    
                    <li class="cbp-item cardiologist">
                        <a href="doctors/member2.html" class="cbp-caption cbp-singlePage">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('img/t1.png') }}" alt="" width="100%">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">LIHAT DETAIL</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="doctors/member2.html" class="cbp-singlePage cbp-l-grid-team-name">Teknik Kendaraan Ringan</a>
                        <div class="cbp-l-grid-team-position">Otomotif</div>
                    </li>
                    <li class="cbp-item cardiologist">
                        <a href="doctors/member3.html" class="cbp-caption cbp-singlePage">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('img/t2.png') }}" alt="" width="100%">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">LIHAT DETAIL</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="doctors/member3.html" class="cbp-singlePage cbp-l-grid-team-name">Teknik Sepeda Motor</a>
                        <div class="cbp-l-grid-team-position">Otomotif</div>
                    </li>
                    <li class="cbp-item neurologist">
                        <a href="doctors/member4.html" class="cbp-caption cbp-singlePage">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('img/t3.png') }}" alt="" width="100%">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">LIHAT DETAIL</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="doctors/member4.html" class="cbp-singlePage cbp-l-grid-team-name">Rekayasa Perangkat Lunak</a>
                        <div class="cbp-l-grid-team-position">Informatika</div>
                    </li>

                </ul>
            </div>
            </div>
            </div>
        </div>

    </section>
    <!-- /Section: team -->
@endsection