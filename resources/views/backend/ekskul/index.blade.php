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
            <li class="active"><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
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

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              @php
              $jml = $kejuruans->count();
              @endphp
              <h3 class="box-title">Total Ekstrakurikuler ( {{$jml}} )
                <small>SMK Assalaam Bandung</small>
                
              </h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-info">
              <span class="fa fa-plus"></span>
                Tambah Ekstrakurikuler
              </button> 
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#kategori">
              <span class="fa fa-list"></span>
                Kategori
              </button> 
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
                        <img src="{{asset('img/'.$kejuruan->foto)}}" class="img-responsive img-thumbnail" alt="" style="width: 225px; height: 225px;">
                        </a>
                        <br><br><br>
                        <a href="{{ route('ekskul.edit', $kejuruan->id) }}" class="btn btn-primary btn-block"><span class="fa fa-edit"></span> Ubah Detail</a>
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
                <h4 class="modal-title">Tambah Ekstrakurikuler Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('ekskul.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                      {!! Form::label('nama','Nama Ekstrakurikuler *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('nama',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('kategori_id') ? 'has-error' : '' }}">
                      {!! Form::label('kategori_id','Kategori Kejuruan *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::select('kategori_id',App\KategoriEkskul::pluck('nama','id')->all(),null,['class'=>'form-control','placeholder'=>'Pilih Kategori', 'required']) !!}
                        {!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('foto') ? 'has-error' : '' }}">
                            {!! Form::label('foto','Foto Ekstrakurikuler *',['class'=>'col-md-12']) !!}
                                <div class="col-md-12">
                                @if(isset($ekskul) && $ekskul->foto)
                                <p>
                                    {!! Html::image(asset('img/'.$ekskul->foto),null,['class'=>'img-rounded img-responsive']) !!}
                                </p>
                                @endif
                                    <input type="file" name="foto" class="btn btn-default btn-block" required=""></input>
                                    {!! $errors->first('foto','<p class="help-block">:message</p>') !!}
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
                $kat = App\KategoriEkskul::all();
                @endphp
                {!! Form::open(['url'=>route('kategori-ekskul.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
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
