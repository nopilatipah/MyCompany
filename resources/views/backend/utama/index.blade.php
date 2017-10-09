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
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
          </ul>
        </li>
        
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Pesan</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        
        <li class="header">KOMPONEN WEBSITE</li>
        <li  class="active"><a href="{{ route('utama.index') }}"><i class="fa fa-laptop"></i> <span>Tampilan Utama</span></a></li>
        <li><a href="#"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
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
            <div class="box-header">
              <h3 class="box-title">Nama Sekolah &nbsp&nbsp&nbsp: <b>SMK ASSALAAM BANDUNG</b>
              </h3>

              <!-- tools box -->
              <button class="btn btn-warning pull-right"><span class="fa fa-edit"></span> Ubah</button>
              <hr>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->

          </div>

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Kontak & Media Sosial
              </h3>

              <!-- tools box -->
              <button class="btn btn-warning pull-right"><span class="fa fa-edit"></span> Ubah</button>
              <hr>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->

          </div>

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tentang Sekolah
              </h3>

              <!-- tools box -->
              <button class="btn btn-warning pull-right"><span class="fa fa-edit"></span> Ubah</button>
              <hr>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->

          </div>

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Slider Utama
              </h3>

              <!-- tools box -->
              <button class="btn btn-warning pull-right"><span class="fa fa-edit"></span> Ubah</button>
              <hr>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->

          </div>

          <div class="box box-info">
            <div class="box-header">
              
              <h3 class="box-title">Lokasi
                <small>SMK Assalaam Bandung</small>
              </h3>
              <a href="{{ route('maps.edit',1) }}" class="btn btn-primary pull-right">Ubah Lokasi</a>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <p>Alamat : {{$vendor->lokasi}}</p>
                <div id="map-canvas"></div>
            </div>
              
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

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
