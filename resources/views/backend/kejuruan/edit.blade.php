@extends('layouts.admin')

@section('header')
<aside class="main-sidebar">
  <style type="text/css">
  .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
</style>
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

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            {!! Form::model($kejuruan, ['url'=>route('kejuruan.destroy',$kejuruan->id), 'method'=>'delete', 'id'=>'myform']) !!}
            {!! Form::close() !!}
            <div class="box-header">
              <h3 class="box-title">Ubah Kejuruan {{ $kejuruan->nama }}
                <small>SMK Assalaam Bandung</small>
              </h3>
                <button id="delete" class="btn btn-danger pull-right"><span class="fa fa-trash"></span> Hapus Kejuruan</button>
              <hr>

            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="col-md-10 col-md-offset-1">
                {!! Form::model($kejuruan,['url'=>route('kejuruan.update',$kejuruan->id), 'method'=>'put', 'files'=>'true', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                   
                            
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
                                    {!! Html::image(asset('img/'.$kejuruan->ruangan),null,['class'=>'img-rounded img-responsive','style'=>'height:200px']) !!}
                                </p>
                                @endif
                                    <input type="file" name="ruangan" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('ruangan','<p class="help-block">:message</p>') !!}
                                </div>
                                {!! Form::label('siswa','Foto Siswa *',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                @if(isset($kejuruan) && $kejuruan->siswa)
                                <p>
                                    {!! Html::image(asset('img/'.$kejuruan->siswa),null,['class'=>'img-rounded img-responsive','style'=>'height:200px']) !!}
                                </p>
                                @endif
                                    <input type="file" name="siswa" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('siswa','<p class="help-block">:message</p>') !!}
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
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>

    <script type="text/javascript">
  $('button#delete').on('click', function(){
  swal({   
    title: "Apakah Anda Yakin ?",
    text: "Anda Tidak Dapat Mengembalikan Data Kejuruan !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus Kejuruan !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>

@endsection