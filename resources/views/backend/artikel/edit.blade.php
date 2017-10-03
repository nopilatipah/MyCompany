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

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Ubah Artikel
                <small>SMK Assalaam Bandung</small>
              </h3>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                {!! Form::model($artikel, ['url'=>route('artikel.update',$artikel->id), 'method'=>'put', 'files'=>'true', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                   
                            
                            <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                            <div>
                                {!! Form::label('judul','Judul Artikel *',['class'=>'col-md-3']) !!}
                            </div>
                                <div class="col-md-6">
                                    {!! Form::text('judul',null,['class'=>'form-control']) !!}
                                    {!! $errors->first('judul','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group{{ $errors->has('kategori_id') ? 'has-error' : '' }}">
                              {!! Form::label('kategori_id','Kategori *',['class'=>'col-md-3']) !!}
                              <div class="col-md-6">
                                {!! Form::select('kategori_id',App\KategoriArtikel::pluck('nama','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Kategori']) !!}
                                {!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
                              </div>
                            </div>
                            <br>

                            <div class="form-group{{ $errors->has('tgl_kegiatan') ? 'has-error' : '' }}">
                            <div>
                                {!! Form::label('tgl_kegiatan','Tanggal Kegiatan *',['class'=>'col-md-3']) !!}
                            </div>
                                <div class="col-md-6">
                                    {!! Form::text('tgl_kegiatan',null,['class'=>'form-control']) !!}
                                    {!! $errors->first('tgl_kegiatan','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <br>
                        
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
                                <div class="col-md-8">
                                @if(isset($artikel) && $artikel->foto)
                                <p>
                                    {!! Html::image(asset('img/'.$artikel->foto),null,['class'=>'img-rounded img-responsive']) !!}
                                </p>
                                @endif
                                    <input type="file" name="foto" class="btn btn-default btn-block" required=""></input>
                                    {!! $errors->first('foto','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12" align="right">
                                {!! Form::submit('Simpan Artikel', ['class'=>'btn btn-primary btn-block']) !!}
                                </div>
                            </div>
                {!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>

@endsection
