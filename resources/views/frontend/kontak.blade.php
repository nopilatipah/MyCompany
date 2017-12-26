@extends('layouts.user')

@section('navbar')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrmOH1T0Znrn7UqKm8mxNU0c4au_SWIFo&amp;libraries=places"></script>
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
                  </ul>
                </li>
                <li><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/galeri')}}">Galeri</a></li>
                <li class="active"><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
@endsection
 
@section('content')
<style>
  #map-canvas{
    width: 1080px;
    height: 400px;
  }
</style>

<br><br><br><br><br>
<section id="callaction" class="home-section paddingtop-40">    
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                    <h2 class="h-bold">Lokasi <b>{{$komponen->nama_sekolah}}</b></h2>
                    <p>{{$vendor->lokasi}}</p>
                    </div>
                    </div>
                    <div class="divider-short"></div>
                    </div><br>
                        <center>
                        <div id="map-canvas"></div>
                        </center>
                        <br><br>
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="cta-text">
                                    <h3>Hubungi Kami</h3>
                                    <p>Anda dapat mengirim kritik dan saran untuk <b>{{$komponen->nama_sekolah}}</b> Disini. </p>
                                    </div>
                                    </div>
                                </div>
                                {!! Form::open(['url'=>url('/kontak'), 'method'=>'post']) !!}
                                <div class="col-md-4">
                                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                        <div class="cta-btn">
                                        <button class="btn btn-skin btn-lg" type="submit">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Nama Depan</label>
                                            <input type="text" name="nama_depan" class="form-control" id="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Nama Belakang</label>
                                            <input type="text" name="nama_belakang" class="form-control" id="lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Subjek</label>
                                            <input type="text" name="subjek" class="form-control" id="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Pesan</label>
                                            <textarea id="message" name="pesan" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                </div>
                            {!! Form::close() !!}
                        </div><br><br>
                    
                    </div>
                </div>
            </div>
            <br><br>
    </section>

<script>

      var lat = {{ $vendor->lat }};
      var lng = {{ $vendor->lng }};

      var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
          lat: lat,
          lng: lng
        },
        zoom:15
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