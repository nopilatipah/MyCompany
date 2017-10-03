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
            <li><a href="{{ route('kejuruan.index') }}"><i class="fa fa-circle-o"></i> Kejuruan</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li class="active"><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
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

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              @php
              $jml = $kejuruans->count();
              @endphp
              <h3 class="box-title">Total Prestasi ( {{$jml}} )
                <small>SMK Assalaam Bandung</small>
                
              </h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-info">
              <span class="fa fa-plus"></span>
                Tambah Prestasi
              </button> 
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">

              @foreach($kejuruans as $kejuruan)
              <div class="col-md-4">
                <div class="panel">
                  <div class="panel-heading" style="background-color:teal;color:#fff;"><strong>{{$kejuruan->nama}}</strong>
                  <a href="{{ route('kejuruan.edit',$kejuruan->id) }}" class="btn btn-warning btn-xs pull-right"><span class="fa fa-edit"></span></a> 
                  </div>
                  <div class="panel-body" style="background-color:#000;color:#fff;height: 300px">
                  
                    <div class="boximg">
                    <center>
                      <img src="{{ asset('img/default.png') }}" class="img-responsive">
                      <span class="label label-danger date">25 December 2015</span>
                      </center>
                      {!! Form::model($kejuruan, ['url'=>route('ekskul.destroy',$kejuruan->id), 'method'=>'delete', 'class'=>'form-inline js-confirm', 'data-confirm'=>'Apakah Anda Yakin Ingin Menghapus '.$kejuruan->nama.'?']) !!}
                  <button type="submit" href="{{ route('kejuruan.destroy',$kejuruan->id) }}" class="btn btn-danger btn-xs pull-right"><span class="fa fa-trash"></span></button>
                  {!! Form::close() !!}
                    </div>  
                    <br>
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

    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Prestasi Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('akun.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                      {!! Form::label('name','Nama Pengguna *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                      {!! Form::label('email','Alamat Email *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::email('email',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('role') ? 'has-error' : '' }}">
                      {!! Form::label('role','Hak Akses *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::select('role',App\Role::pluck('display_name','id')->all(),null,['class'=>'form-control','placeholder'=>'Pilih Hak Akses', 'required']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
@endsection
