@extends('layouts.admin')

@section('header')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />

  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

  
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
            <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li class="active"><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
            <li><a href="{{ route('alumni.index') }}"><i class="fa fa-circle-o"></i> Testimoni</a></li>
          </ul>
        </li>
        
       
        
        <li class="header">KOMPONEN WEBSITE</li>
        <li><a href="{{ route('utama.index') }}"><i class="fa fa-laptop"></i> <span>Tampilan Utama</span></a></li>
        <li><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
        @endrole

        @role('artikel')
        <li class="active"><a href="{{ route('artikel.index') }}"><i class="fa fa-laptop"></i> <span>Artikel</span></a></li>
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

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tambah Artikel Baru
                <small>SMK Assalaam Bandung</small>
              </h3>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="col-md-10 col-md-offset-1">
                {!! Form::open(['url'=>route('artikel.store'), 'method'=>'post', 'files'=>'true', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                   
                            
                            <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                            <div>
                                {!! Form::label('judul','Judul Artikel *',['class'=>'col-md-3']) !!}
                            </div>
                                <div class="col-md-9">
                                    {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Contoh : Memperingati Hari Sumpah Pemuda']) !!}
                                    {!! $errors->first('judul','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('kategori_id','tgl_kegiatan') ? 'has-error' : '' }}">
                              {!! Form::label('kategori_id','Kategori *',['class'=>'col-md-3']) !!}
                              <div class="col-md-3">
                                {!! Form::select('kategori_id',App\KategoriArtikel::pluck('nama','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Kategori']) !!}
                                {!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
                              </div>
                              {!! Form::label('tgl_kegiatan','Tgl Kegiatan *',['class'=>'col-md-2 col-md-offset-1']) !!}
                              <div class="col-md-3">
                                    {!! Form::date('tgl_kegiatan',null,['class'=>'form-control']) !!}
                                    {!! $errors->first('tgl_kegiatan','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            

                        
                            <div class="form-group{{ $errors->has('konten') ? 'has-error' : '' }}">
                            {!! Form::label('konten','Konten Artikel *',['class'=>'col-md-6']) !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('konten',null,['class'=>'ckeditor']) !!}
                                    {!! $errors->first('konten','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <br>
                            
                            <div class="form-group{{ $errors->has('foto') ? 'has-error' : '' }}">
                            {!! Form::label('foto','Foto Artikel *',['class'=>'col-md-2']) !!}
                                <div class="col-md-4">
                                @if(isset($artikel) && $artikel->foto)
                                <p>
                                    {!! Html::image(asset('img/'.$artikel->foto),null,['class'=>'img-rounded img-responsive']) !!}
                                </p>
                                @endif
                                    <input type="file" name="foto" class="btn btn-default btn-block" required=""></input>
                                    {!! $errors->first('foto','<p class="help-block">:message</p>') !!}
                                </div>
                                {!! Form::label('tags','Tags *',['class'=>'col-md-2']) !!}
                                <div class="col-md-4">
                                  <input data-role="tagsinput" type="text" name="tags" class="form-control">
                                </div>
                            </div>
                            <br>

                            <hr>
                            <div class="form-group">
                                <div class="col-md-12" align="right">
                                {!! Form::submit('Simpan Artikel', ['class'=>'btn btn-primary btn-block']) !!}
                                </div>
                            </div>
                {!! Form::close() !!}
            </div>
          </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>

@endsection
