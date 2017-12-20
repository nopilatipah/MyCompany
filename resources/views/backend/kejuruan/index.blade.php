@extends('layouts.admin')

@section('header')
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
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-th-list"></i>
            <span>Form Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profil.edit', 1 ) }}"><i class="fa fa-circle-o"></i> Profil Umum</a></li>
            <li class="active"><a href="{{ route('kejuruan.index') }}"><i class="fa fa-circle-o"></i> Kejuruan</a></li>
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
        <li><a href="{{ route('utama.index') }}"><i class="fa fa-laptop"></i> <span>Tampilan Utama</span></a></li>
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
              @php
              $jml = $kejuruans->count();
              @endphp
              <h3 class="box-title">Total Kejuruan ( {{$jml}} )
                <small>SMK Assalaam Bandung</small>
                
              </h3>
              <a href="{{ route('kejuruan.create') }}" class="btn btn-primary btn-sm pull-right"><span class="fa fa-plus"></span> &nbsp &nbsp Tambah Kejuruan</a>
              <a href="{{ route('perusahaan.index') }}" class="btn btn-danger btn-sm pull-right"><span class="fa fa-list"></span> &nbsp &nbsp Perusahaan</a>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">

              @foreach($kejuruans as $kejuruan)
              <div class="col-sm-4" align="center">
                <a href="">
                    <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">{{ $kejuruan->nama }}</h3>
                        
                      </div>
                    <div class="box-body pad">
                        <img src="{{asset('img/'.$kejuruan->siswa)}}" class="img-responsive img-thumbnail" alt="" style="width: 225px; height: 225px;">
                        </a>
                        <br><br><br>
                        <a href="{{ route('kejuruan.edit', $kejuruan->id) }}" class="btn btn-primary btn-block"><span class="fa fa-edit"></span> Detail Kejuruan</a>
                    </div>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->
  
@endsection
