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
                    <li><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
                    <li><a href="{{url('/ekstrakurikuler')}}">Ekstrakurikuler</a></li>
                    <li><a href="{{url('/prestasi')}}">Prestasi</a></li>
                  </ul>
                </li>
                <li class="active"><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
@endsection

@section('content')
<br><br><br><br><br>

<section id="callaction" class="home-section paddingtop-40">    
           <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="cta-text">
                                    <h3>Santunan Anak Yatim SMK Assalaam Bandung</h3>
                                    <p>
                                    <span class="fa fa-user"></span> Nopi Latipah &nbsp&nbsp&nbsp
                                    <span class="fa fa-calendar"></span> 08 September 2017 &nbsp&nbsp&nbsp
                                    <span class="fa fa-eye"></span> 200 Views &nbsp&nbsp&nbsp
                                    <span class="fa fa-comments"></span> 30 Komentar &nbsp&nbsp&nbsp
                                    <span class="fa fa-tag"></span> Keagamaan &nbsp&nbsp&nbsp
                                    </p>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <img src="{{ asset('Frontend/universal/img/blog-medium.jpg') }}" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.... </p>
                                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                        <div class="cta-btn">
                                        <a href="#" class="btn btn-skin">Baca Selengkapnya</a>  
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <br>
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="cta-text">
                                    <h3>Santunan Anak Yatim SMK Assalaam Bandung</h3>
                                    <p>
                                    <span class="fa fa-user"></span> Nopi Latipah &nbsp&nbsp&nbsp
                                    <span class="fa fa-calendar"></span> 08 September 2017 &nbsp&nbsp&nbsp
                                    <span class="fa fa-eye"></span> 200 Views &nbsp&nbsp&nbsp
                                    <span class="fa fa-comments"></span> 30 Komentar &nbsp&nbsp&nbsp
                                    <span class="fa fa-tag"></span> Keagamaan &nbsp&nbsp&nbsp
                                    </p>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <img src="{{ asset('Frontend/universal/img/blog-medium.jpg') }}" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.... </p>
                                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                        <div class="cta-btn">
                                        <a href="#" class="btn btn-skin">Baca Selengkapnya</a>  
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3">
                        <div class="callaction bg-gray">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Populer</a></li>
                              <li><a data-toggle="tab" href="#menu1">Terbaru</a></li>
                            </ul>

                            <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <h3>HOME</h3>
                                <p>Some content.</p>
                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Some content in menu 1.</p>
                              </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
</section>
@endsection