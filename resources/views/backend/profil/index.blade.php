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
            <li class="active"><a href="{{ route('profil.edit', 1 ) }}"><i class="fa fa-circle-o"></i> Profil Umum</a></li>
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
        <li><a href="{{ route('utama.index') }}"><i class="fa fa-laptop"></i> <span>Tampilan Utama</span></a></li>
        <li><a href="#"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endsection

@section('content')

{!! Form::model($profils, ['url'=>route('profil.update', $profils->id), 'method'=>'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
    
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Profil Umum
                <small>SMK Assalaam Bandung</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <div>
                  {!! Form::textarea('profil',null,['class'=>'ckeditor', 'id'=>'editor1', 'name'=>'profil', 'rows'=>'10', 'cols'=>'80']) !!}
                </div>
                <br>
                {!! Form::submit('Simpan Perubahan Profil', ['class'=>'btn btn-primary pull-right']) !!}
            </div>
          </div>
          <!-- /.box -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Sejarah Singkat
                <small>SMK Assalaam Bandung</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-hzeader -->
            <div class="box-body pad">
                <div>
                  {!! Form::textarea('sejarah',null,['class'=>'ckeditor', 'id'=>'editor1', 'name'=>'sejarah', 'rows'=>'10', 'cols'=>'80']) !!}
                </div>
                <br>
                {!! Form::submit('Simpan Perubahan Sejarah', ['class'=>'btn btn-primary pull-right']) !!}
            </div>

          </div>
          <!-- /.box -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Sambutan Kepala
                <small>SMK Assalaam Bandung</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <div>
                  {!! Form::textarea('sambutan',null,['class'=>'ckeditor', 'id'=>'editor1', 'name'=>'sambutan', 'rows'=>'10', 'cols'=>'80']) !!}
                </div>
                <br>
                {!! Form::submit('Simpan Perubahan Sambutan', ['class'=>'btn btn-primary pull-right']) !!}
            </div>
          </div>
          <!-- /.box -->
          
        </div>
        <!-- /.col-->
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Visi
                <small>SMK Assalaam Bandung</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <div>
                  {!! Form::textarea('visi',null,['class'=>'ckeditor', 'id'=>'editor1', 'name'=>'visi', 'rows'=>'10', 'cols'=>'80']) !!}
                </div>
                <br>
                {!! Form::submit('Simpan Perubahan Visi', ['class'=>'btn btn-primary pull-right']) !!}
            </div>
          </div>
          <!-- /.box -->
          </div>
          <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Misi
                <small>SMK Assalaam Bandung</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <div>
                  {!! Form::textarea('misi',null,['class'=>'ckeditor', 'id'=>'editor1', 'name'=>'misi', 'rows'=>'10', 'cols'=>'80']) !!}
                </div>
                <br>
                {!! Form::submit('Simpan Perubahan Misi', ['class'=>'btn btn-primary pull-right']) !!}
            </div>
          </div>
          <!-- /.box -->
          </div>
          <div class="col-md-12">
          <br>
          {!! Form::submit('Simpan Semua Perubahan', ['class'=>'btn btn-warning btn-lg btn-block']) !!}
          </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

{!! Form::close() !!}
  
@endsection
