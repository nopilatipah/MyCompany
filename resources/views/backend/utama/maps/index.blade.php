@extends('layouts.admin')

@section('header')

<style>
  #map-canvas{
    width: 1080px;
    height: 400px;
  }
</style>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrmOH1T0Znrn7UqKm8mxNU0c4au_SWIFo&amp;libraries=places"></script>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href=""><i class="fa fa-circle text-primary"></i> {{ Auth::user()->akses }}</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li>
          <a href="{{ url('/home') }}">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>

        @role('admin')
        <li>
          <a href="{{ route('akun.index') }}">
            <i class="fa fa-group"></i> <span>Akun Author</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th-list"></i>
            <span>Form Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profil.edit', 1 ) }}"><i class="fa fa-circle-o"></i> Profil Umum</a></li>
            <li><a href="{{ route('kejuruan.index') }}"><i class="fa fa-circle-o"></i> Kejuruan</a></li>
            <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
            <li><a href="{{ route('alumni.index') }}"><i class="fa fa-circle-o"></i> Testimoni</a></li>
          </ul>
        </li>
        
        @php
        $pes = App\Pesan::where('status','=',0)->count();
        @endphp
        <li>
          <a href="{{ route('pesan.index') }}">
            <i class="fa fa-envelope"></i> <span>Pesan</span>
            @if($pes > 0)
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">{{$pes}}</small>
            </span>
            @endif
          </a>
        </li>
        
        <li class="header">KOMPONEN WEBSITE</li>
        <li class="active"><a href="{{ route('utama.index') }}"><i class="fa fa-laptop"></i> <span>Tampilan Utama</span></a></li>
        <li><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
        @endrole

        @role('artikel')
        <li><a href="{{ route('artikel.index') }}"><i class="fa fa-laptop"></i> <span>Artikel</span></a></li>
        <li><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
        @php
        $pes = App\Pesan::where('status','=',0)->count();
        @endphp
        <li>
          <a href="{{ route('pesan.index') }}">
            <i class="fa fa-envelope"></i> <span>Pesan</span>
            @if($pes > 0)
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">{{$pes}}</small>
            </span>
            @endif
          </a>
        </li>
        @endrole

        @role('ekskul')
        <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-laptop"></i> <span>Ekstrakurikuler</span></a></li>
        <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-laptop"></i> <span>Prestasi</span></a></li>
        @endrole

        @role('fasilitas')
        <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-laptop"></i> <span>Fasilitas</span></a></li>
        @endrole

        @role('kejuruan')
        <li><a href="{{ route('kejuruan.index') }}"><i class="fa fa-laptop"></i> <span>Kejuruan</span></a></li>
        <li><a href="{{ route('alumni.index') }}"><i class="fa fa-laptop"></i> <span>Testimoni</span></a></li>
        @endrole
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endsection

@section('content')

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
          {!! Form::model($vendor, ['url'=>route('maps.update', $vendor->id), 'method'=>'put', 'files'=>'true', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
            <div class="box-header">
              
              <h3 class="box-title">Ubah Lokasi
                <small>SMK Assalaam Bandung</small>
              </h3>
              <button class="btn btn-danger pull-right">Simpan Perubahan Lokasi</button>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <div class="form-group">
                  <div class="col-md-3">
                    <label for="">Alamat Lengkap (Baru)</label>
                  </div>
                  <div class="col-md-9">
                    {!! Form::text('lokasi',null,['class'=>'form-control input-sm']) !!}
                  </div>
                  
                </div>
                <br>
                 <div class="form-group">
                 <div class="col-md-3">
                   <label for="">Cari Lokasi</label>
                 </div>
                 <div class="col-md-9">
                   <input type="text" id="searchmap" class="form-control input-sm">
                 </div> <br><br>
                  <div class="col-md-12">
                    <div id="map-canvas"></div>
                    <br>
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-md-1">
                   <label for="">Latitude</label>
                 </div>
                 <div class="col-md-5">
                   {!! Form::text('lat',null,['class'=>'form-control input-sm','id'=>'lat']) !!}
                 </div>
                 <div class="col-md-1">
                   <label for="">Longitude</label>
                 </div>
                 <div class="col-md-5">
                   {!! Form::text('lng',null,['class'=>'form-control input-sm','id'=>'lng']) !!}
                 </div>
                </div>
            
              {{ Form::close() }}
            </div>
              
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

  
@endsection
@section('scripts')
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
        map: map,
        draggable: true
      });

      var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

      google.maps.event.addListener(searchBox, 'places_changed', function(){

        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        for(i=0; place=places[i]; i++){
          bounds.extend(place.geometry.location);
          marker.setPosition(place.geometry.location);
        }

        map.fitBounds(bounds);
        map.setZoom(15);

      });

      google.maps.event.addListener(marker,'position_changed', function(){

        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);

      });
      
    </script>
@endsection