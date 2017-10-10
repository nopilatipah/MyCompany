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
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Populer</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Terbaru</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tags</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                                        <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                                        <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                                        <div role="tabpanel" class="tab-pane" id="settings">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
                                    </div>
</div>
                </div>
            </div>
</section>
@endsection