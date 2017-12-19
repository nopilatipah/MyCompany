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
            <li class="active"><a href="{{ route('kejuruan.index') }}"><i class="fa fa-circle-o"></i> Kejuruan</a></li>
            <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
            <li><a href="{{ route('alumni.index') }}"><i class="fa fa-circle-o"></i> Testimoni</a></li>
          </ul>
        </li>
        
        <li>
          <a href="{{ route('pesan.index') }}">
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
              <h3 class="box-title">Tambah Kejuruan
                <small>SMK Assalaam Bandung</small>
              </h3>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                {!! Form::open(['url'=>route('kejuruan.store'), 'method'=>'post', 'files'=>'true', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                   
                            
                            <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                            <div>
                                {!! Form::label('nama','Nama Program Keahlian *',['class'=>'col-md-3']) !!}
                            </div>
                                <div class="col-md-6">
                                    {!! Form::text('nama',null,['class'=>'form-control','placeholder'=>'Contoh : Teknik Sepeda Motor']) !!}
                                    {!! $errors->first('nama','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <br>
                            <div class="form-group{{ $errors->has('profil') ? 'has-error' : '' }}">
                            {!! Form::label('profil','Profil Umum *',['class'=>'col-md-6']) !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('profil',null,['class'=>'ckeditor']) !!}
                                    {!! $errors->first('profil','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <br>
                            <div class="form-group{{ $errors->has('program') ? 'has-error' : '' }}">
                            {!! Form::label('program','Program Belajar *',['class'=>'col-md-6']) !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('program',null,['class'=>'ckeditor']) !!}
                                    {!! $errors->first('program','<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <br>
                            
                            <div class="form-group{{ $errors->has('ruangan') ? 'has-error' : '' }}">
                            {!! Form::label('ruangan','Foto Ruang Praktik *',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                @if(isset($kejuruan) && $kejuruan->ruangan)
                                <p>
                                    {!! Html::image(asset('img/'.$kejuruan->ruangan),null,['class'=>'img-rounded img-responsive']) !!}
                                </p>
                                @endif
                                    <input type="file" name="ruangan" class="btn btn-default btn-block" required=""></input>
                                    {!! $errors->first('ruangan','<p class="help-block">:message</p>') !!}
                                    <font color="gray" size="2">* Disarankan : Ukuran 600 x 400 px (Maksimal 2 Mb)</font>
                                </div>
                                {!! Form::label('siswa','Foto Siswa *',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                @if(isset($kejuruan) && $kejuruan->siswa)
                                <p>
                                    {!! Html::image(asset('img/'.$kejuruan->siswa),null,['class'=>'img-rounded img-responsive']) !!}
                                </p>
                                @endif
                                    <input type="file" name="siswa" class="btn btn-default btn-block" required=""></input>
                                    {!! $errors->first('siswa','<p class="help-block">:message</p>') !!}
                                  
                                    <font color="gray" size="2">* Disarankan : Ukuran 300 x 300 px (Maksimal 2 Mb)</font>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12" align="right">
                                {!! Form::submit('Simpan Kejuruan', ['class'=>'btn btn-primary btn-block']) !!}
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