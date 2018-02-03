@extends('layouts.user')

@section('content')
@php
$komponen = App\Komponen::find(1);
$kejuruan = App\Kejuruan::all();
$info = App\Info::find(1);
$vendor = App\Vendor::find(1);
$berita = App\Artikel::all()->take(4);
@endphp
<style>
  #map-canvas{
    width: 1350px;
    height: 450px;
  }
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrmOH1T0Znrn7UqKm8mxNU0c4au_SWIFo&amp;libraries=places"></script>

<div class="ms-hero ms-hero-material">
        <span class="ms-hero-bg"></span>
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-7">
              <div id="carousel-hero" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <div class="carousel-caption">
                      <div class="ms-hero-material-text-container">
                        <header class="ms-hero-material-title animated slideInLeft animation-delay-5">
                          <h1 class="animated fadeInLeft animation-delay-15 font-smoothing">
                            <strong>{{$komponen->nama_sekolah}}</strong></h1>
                          <h2 class="animated fadeInLeft animation-delay-18">
                            <span class="color-warning">{{$komponen->deskripsi}}</span></h2>
                        </header>
                        <ul class="ms-hero-material-list">
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-18">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-warning shadow-3dp">
                                <i class="zmdi zmdi-airplane"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-19">Terakreditasi {{$komponen->akreditasi}}</div>
                          </li>
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-20">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-success shadow-3dp">
                                <i class="zmdi zmdi-bike"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-21">Keahlian Ganda Untuk Setiap Kejuruan Agar Siswa Dapat Menerapkannya didunia Kerja (Industri).</div>
                          </li>
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-22">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-danger shadow-3dp">
                                <i class="zmdi zmdi-album"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-23">Peralatan Praktik yang Up To Date sesuai dengan kebutuhan dunia Industri.</div>
                          </li>
                        </ul>
                        <div class="ms-hero-material-buttons text-right">
                          <div class="ms-hero-material-buttons text-right">
                            <a href="{{url('profil')}}" class="btn btn-warning btn-raised animated fadeInLeft animation-delay-24 mr-2">
                              <i class="zmdi zmdi-settings"></i> Lihat Profil Sekolah</a>
                          </div>
                        </div>
                      </div>
                      <!-- ms-hero-material-text-container -->
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="carousel-caption">
                      <div class="ms-hero-material-text-container">
                        <header class="ms-hero-material-title animated slideInLeft animation-delay-5">
                          <h1 class="animated fadeInLeft animation-delay-15">
                            <strong>Jaminan</strong> Pendidikan</h1>
                          <h2 class="animated fadeInLeft animation-delay-18">{{$komponen->nama_sekolah}}</h2>
                        </header>
                        <ul class="ms-hero-material-list">
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-18">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-info shadow-3dp">
                                <i class="zmdi zmdi-city"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-19">Anak didik dipersiapkan untuk bekerja, berwirausaha, maupun melanjutkan ke perguruan tinggi.</div>
                          </li>
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-20">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-royal shadow-3dp">
                                <i class="zmdi zmdi-cake"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-21">Lebih dari 100 Kerja sama dengan dunia Industri dan dunia Usaha.</div>
                          </li>
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-22">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-warning shadow-3dp">
                                <i class="zmdi zmdi-coffee"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-23">Sertifikasi Kompetensi akan didapatkan setelah melakukan Uji Kompetensi.</div>
                          </li>
                        </ul>
                        <div class="ms-hero-material-buttons text-right">
                          <div class="ms-hero-material-buttons text-right">
                            <a href="{{url('profil')}}" class="btn btn-warning btn-raised animated fadeInLeft animation-delay-24 mr-2">
                              <i class="zmdi zmdi-settings"></i> Lihat Profil Sekolah</a>
                          </div>
                        </div>
                      </div>
                      <!-- ms-hero-material-text-container -->
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="carousel-caption">
                      <div class="ms-hero-material-text-container">
                        <header class="ms-hero-material-title animated slideInLeft animation-delay-5">
                          <h1 class="animated fadeInLeft animation-delay-15">
                            <strong>Pendaftaran</strong> Siswa Baru</h1>
                          <h2 class="animated fadeInLeft animation-delay-18">{{$komponen->nama_sekolah}}</h2>
                        </header>
                        <ul class="ms-hero-material-list">
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-18">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-info shadow-3dp">
                                <i class="zmdi zmdi-city"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-19">Dibuka Pada Tanggal {{$info->tgl_daftar}}</div>
                          </li>
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-20">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-royal shadow-3dp">
                                <i class="zmdi zmdi-cake"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-21">Bertempat di {{$info->lokasi}}</div>
                          </li>
                          <li class="">
                            <div class="ms-list-icon animated zoomInUp animation-delay-22">
                              <span class="ms-icon ms-icon-circle ms-icon-xlg color-warning shadow-3dp">
                                <i class="zmdi zmdi-coffee"></i>
                              </span>
                            </div>
                            <div class="ms-list-text animated fadeInRight animation-delay-23">Jam Kerja {{$info->waktu}}</div>
                          </li>
                        </ul>
                        <div class="ms-hero-material-buttons text-right">
                          <div class="ms-hero-material-buttons text-right">
                            <a href="{{url('profil')}}" class="btn btn-warning btn-raised animated fadeInLeft animation-delay-24 mr-2">
                              <i class="zmdi zmdi-settings"></i> Lihat Persyaratan</a>
                          </div>
                        </div>
                      </div>
                      <!-- ms-hero-material-text-container -->
                    </div>
                  </div>
                  
                  <div class="carousel-controls">
                    <!-- Controls -->
                    <a class="left carousel-control animated zoomIn animation-delay-30" href="#carousel-hero" role="button" data-slide="prev">
                      <i class="zmdi zmdi-chevron-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control animated zoomIn animation-delay-30" href="#carousel-hero" role="button" data-slide="next">
                      <i class="zmdi zmdi-chevron-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-hero" data-slide-to="0" class="animated fadeInUpBig animation-delay-27 active"></li>
                      <li data-target="#carousel-hero" data-slide-to="1" class="animated fadeInUpBig animation-delay-28"></li>
                      <li data-target="#carousel-hero" data-slide-to="2" class="animated fadeInUpBig animation-delay-29"></li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5">
              <div class="ms-hero-img animated zoomInUp animation-delay-30">
                <img src="{{asset('img/student-home.png')}}" alt="" class="img-fluid">
                <div id="carousel-hero-img" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
                
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- container -->
      </div>
      <!-- ms-hero ms-hero-black -->

      <div class="container mt-4">
        <div class="row">
          @foreach($berita as $data)
          <div class="ms-feature col-xl-3 col-lg-6 col-md-6 card wow flipInX animation-delay-4">
            <div class="text-center card-block">
              <img src="{{asset('img/'.$data->foto)}}" width="200px">
              <h4 class="color-info">{{$data->judul}}</h4>
              <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dicta error.</p>
              <a href="" class="btn btn-info btn-raised">Baca Selengkapnya</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="container mt-4">
        <h2 class="text-center color-primary mb-2 wow fadeInDown animation-delay-4">Sekolah Menengah Kejuruan Assalaam Bandung</h2>
        <p class="lead text-center aco wow fadeInDown animation-delay-5 mw-800 center-block mb-4"> Sekolah berkualitas dengan program pembelajaran yang berkualitas, sumber daya pengajar yang berkualitas, dan sarana prasarana yang lengkap dan mutakhir</p>
        <div class="row">
          @foreach($kejuruan as $data)
          <div class="col-lg-4 col-sm-6">
            <div class="card card-info wow zoomInUp animation-delay-5">
              <div class="bg-info">
                <img src="{{asset('img/'.$data->siswa)}}" alt="..." class="img-avatar-circle"> </div>
              <div class="card-block pt-4 text-center">
                <br>
                <button class="btn btn-raised btn-primary" >{{$data->nama}}</button>
                
                
              </div>
            </div>
          </div>
          @endforeach
          <div class="container mt-6">
        <div class="panel panel-light panel-flat">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-3" role="tablist">
            @foreach($kejuruan as $data)
            <li class="nav-item wow fadeInDown animation-delay-6" role="presentation">
              <a href="#{{$data->id}}" aria-controls="windows" role="tab" data-toggle="tab" class="nav-link withoutripple">
                <i class="zmdi zmdi-tag"></i>
                <span class="d-none d-md-inline">{{$data->nama}}</span>
              </a>
            </li>
            @endforeach
          </ul>
          <div class="panel-body">
            <!-- Tab panes -->
            
            <div class="tab-content mt-5">
              @foreach($kejuruan as $data)
              <div role="tabpanel" class="tab-pane fade" id="{{$data->id}}">
                <div class="row">
                  <div class="col-lg-6 order-lg-2">
                    <center>
                    <img src="{{asset('img/'.$data->siswa)}}" alt="" class="img-fluid animated zoomIn animation-delay-8" width="400px"></center> </div>
                  <div class="col-lg-6 order-lg-1">
                    <h3 class="text-normal animated fadeInUp animation-delay-4">{{$data->nama}}</h3>
                    <p class="lead lead-md animated fadeInUp animation-delay-6">{!!$data->profil!!}</p>
                    <div class="">
                      <button type="button" class="btn btn-primary btn-raised" data-toggle="modal" data-target="#myModal{{$data->id}}">
                      <i class="zmdi zmdi-info"></i>Target Pembelajaran
                      </button>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal modal-default" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog animated zoomIn animated-3x" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title color-primary" id="myModalLabel">{{$data->nama}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                        </div>
                        <div class="modal-body">
                            {!!$data->program!!}
                        </div>
                        
                    </div>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
        <!-- panel -->
      </div>
        </div>
      </div>
      <!-- container -->
      <div class="wrap wrap-mountain mt-6">
        <div class="container">
          <h2 class="text-center text-light mb-6 wow fadeInDown animation-delay-5">{{$komponen->nama_sekolah}} Sekolah
            <strong>IDAMAN</strong></h2>
          <div class="row">
            <div class="col-lg-6 order-lg-2 mb-4  center-block">
              <img src="{{asset('img/'.$sambutan->foto)}}" alt="" class="img-fluid center-block wow zoomIn animation-delay-12" height="200px"> </div>
            <div class="col-lg-6 order-lg-1 pr-6">
              <p class="wow fadeInLeft animation-delay-6">{!!$sambutan->sambutan!!}</p>
              
            </div>
          </div>
        </div>
      </div>
      

      <div class="wrap wrap-danger mt-6">
        <h2 class="text-center no-m">Apa Yang Alumni Kami Katakan ??</h2>
        <div id="carousel-example-generic" class="carousel carousel-cards carousel-fade slide" data-ride="carousel" data-interval="7000">
          <!-- Indicators -->
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="carousel-caption">
                <div class="container">
                  <div class="row">
                    @foreach($alumni as $data)
                    <div class="col-lg-4">
                      <div class="card animated flipInX animation-delay-2 mb-4">
                        <blockquote class="blockquote blockquote-avatar withripple">
                          <img src="{{asset('img/'.$data->foto)}}" alt="" class="avatar d-none d-sm-block">
                          <p>{{$data->testimoni}}</p>
                          <footer>{{$data->nama}}, {{$data->pekerjaan}}.</footer>
                        </blockquote>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div id="map-canvas"></div>

      <script>

      var lat = {{ $vendor->lat }};
      var lng = {{ $vendor->lng }};

      var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
          lat: lat,
          lng: lng
        },
        zoom:17
      });

      var marker = new google.maps.Marker({
        position: {
          lat: lat,
          lng: lng
        },
        map: map
      });
      
    </script>
@endsection