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
        <li class="active">
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
        <li><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
        @endrole

        @role('artikel')
        <li><a href="{{ route('artikel.index') }}"><i class="fa fa-laptop"></i> <span>Artikel</span></a></li>
        <li><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
        @php
        $pes = App\Pesan::where('status','=',0)->count();
        @endphp
        <li class="active">
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
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-android-mail"></i>

              <h3 class="box-title">Pesan Dari {{$pesan->nama_depan}} {{$pesan->nama_belakang}}</h3>
              <small><i>Dikirim Pada {{$pesan->created_at}}</i></small>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-info">
              <span class="fa fa-plus"></span>
                &nbsp &nbsp Balas Pesan
              </button> 

            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <b>Subjek :</b> <i>{{$pesan->subjek}}</i> <br><br>
              <b>Isi Pesan</b>
              <textarea class="form-control">{{$pesan->pesan}}</textarea>
            </div>
            
          </div>
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-android-mail"></i>

              <h3 class="box-title">Pesan Lainnya Yang Belum Dibaca</h3>

            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
              @foreach($pesans as $data)
                <li>
                  <!-- drag handle -->
                  <i class="ion ion-android-mail"></i>
                  <!-- todo text -->
                  <span class="text">{{$data->nama_depan}} {{$data->nama_belakang}}</span>
                  <!-- Emphasis label -->
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> {{$data->created_at}}</small>&nbsp
                  Subjek : {{$data->subjek}} || <i>{!! str_limit($data->pesan, 90) !!}</i>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    {!! Form::model($data, ['url'=>route('pesan.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
                    {!! Form::close() !!}
                    <a href="{{route('pesan.show',$data->id)}}" class="btn btn-info btn-xs">Baca</a>
                    <button id="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            
          </div>
        </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

    <div class="modal modal-default fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Balas Pesan</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($pesan, ['url'=>route('pesan.update',$pesan->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                      {!! Form::label('balasan','Penerima *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('balasan',$pesan->email,['class'=>'form-control']) !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('balasan') ? 'has-error' : '' }}">
                      {!! Form::label('balasan','Isi Pesan *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::textarea('balasan',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('balasan', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                {!! Form::submit('Kirim Balasan', ['class'=>'btn btn-primary']) !!}
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

@endsection
