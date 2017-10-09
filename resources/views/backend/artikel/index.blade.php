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
            <i class="fa fa-group"></i> <span>Akun Admin</span>
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
            <li><a href="{{ route('kejuruan.index') }}"><i class="fa fa-circle-o"></i> Kejuruan</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li class="active"><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
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
              $jml = App\Artikel::all()->count();
              @endphp
              <h3 class="box-title">Total Artikel ( {{$jml}} )
                <small>SMK Assalaam Bandung</small>
              </h3>
              <a href="{{ route('artikel.create') }}" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> &nbsp &nbsp Tambah Artikel Baru</a>
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#kategori">
              <span class="fa fa-list"></span>
                Kategori
              </button> 
              <hr>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body pad">
            @foreach($artikels as $artikel)
            <form method="delete" action="{{route('artikel.destroy',$artikel->id)}}" class="form-inline js-confirm" data-confirm="Apakah Anda Yakin Ingin Menghapus Artikel ?">
              <div class="box box-danger">
                <div class="box-header">
                  <h4 class="box-title"><span class="fa fa-tag"></span> {{ $artikel->kategori }}</h4>
                  <a href="{{ route('artikel.edit',$artikel->id) }}" class="btn btn-warning btn-sm pull-right"><span class="fa fa-edit"></span> Ubah</a>
                  <button type="submit" class="btn btn-danger btn-sm pull-right"><span class="fa fa-trash"></span> Hapus</button>
                  </form>
                </div>
                <div class="box-body pad">
                  <div class="col-md-4">
                    <img src="{{ asset('img/'.$artikel->foto) }}" class="img-thumbnail img-responsive" style="width: 300px;">
                  </div>
                  <div class="col-md-8">
                    <h3>{{ $artikel->judul }}</h3>
                    <span class="fa fa-clock-o"></span> <b>{{ $artikel->tgl_kegiatan }}</b>&nbsp&nbsp&nbsp
                    <span class="fa fa-user"></span> <b>{{ $artikel->author }}</b>&nbsp&nbsp&nbsp
                    <span class="fa fa-eye"></span> <b>{{ $artikel->views }}</b>&nbsp&nbsp&nbsp
                    <span class="fa fa-comments"></span> <b>30</b>&nbsp&nbsp&nbsp
                  </div>
                  <div class="col-md-8">
                    <p align="justify">{!! str_limit($artikel->konten, 300) !!} <a href="{{ route('artikel.show',$artikel->id) }}" class="btn btn-info btn-xs">Selengkapnya</a></p>
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

    <div class="modal modal-default fade" id="kategori">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kategori Ekstrakurikuler</h4>
              </div>
              <div class="modal-body">
                @php
                $kat = App\KategoriArtikel::all();
                @endphp
                {!! Form::open(['url'=>route('kategori-artikel.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                      {!! Form::label('nama','Nama Kategori *',['class'=>'col-md-3']) !!}
                      <div class="col-md-6">
                        {!! Form::text('nama',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-3">
                      {!! Form::submit('Simpan', ['class'=>'btn btn-warning']) !!}
                      </div>
                    </div>
                
                  
                
                {!! Form::close() !!}
                <hr>
                
                    @foreach($kat as $data)
                      <p class="col-sm-4"><span class="fa fa-tag"></span> {{$data->nama}} <a href=""><span class="fa fa-trash"></span></a></p>
                    @endforeach
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              </div>
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
@endsection
