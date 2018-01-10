@extends('layouts.admin')

@section('header')
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
        <li class="active"><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
        @endrole

        @role('artikel')
        <li><a href="{{ route('artikel.index') }}"><i class="fa fa-laptop"></i> <span>Artikel</span></a></li>
        <li class="active"><a href="{{ route('info.index') }}"><i class="fa fa-clone"></i> <span>Informasi Tambahan</span></a></li>
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

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Informasi Pendaftaran
                <small>SMK Assalaam Bandung</small>
              </h3>
              @if($info->count() > 0)
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#editinfo">
              <span class="fa fa-edit"></span>
                &nbsp &nbsp Ubah Informasi
              </button>
              <div class="modal modal-primary fade" id="editinfo">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Informasi Pendaftaran</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('info.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('tgl_daftar') ? 'has-error' : '' }}">
                      {!! Form::label('tgl_daftar','Tanggal Pendaftaran *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('tgl_daftar',null,['class'=>'form-control','required','placeholder'=>'Contoh : 12 - 30 Juni 2018']) !!}
                        {!! $errors->first('tgl_daftar', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('waktu') ? 'has-error' : '' }}">
                      {!! Form::label('waktu','Waktu Pendaftaran *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('waktu',null,['class'=>'form-control','required','placeholder'=>'Contoh : 08.00 - 14.00 WIB']) !!}
                        {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('lokasi') ? 'has-error' : '' }}">
                      {!! Form::label('lokasi','Lokasi Pendaftaran *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('lokasi',null,['class'=>'form-control','required','placeholder'=>'Contoh : Kampus SMK Assalaam']) !!}
                        {!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('syarat') ? 'has-error' : '' }}">
                      {!! Form::label('syarat','Persyaratan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('syarat',null,['class'=>'form-control','required','placeholder'=>'']) !!}
                        {!! $errors->first('syarat', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                {!! Form::submit('Simpan', ['class'=>'btn btn-warning']) !!}
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
              @endif
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              @if($info->count() > 0)
              @foreach($info as $data)
              <center>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Tanggal Pendaftaran</span></li></ul></td>
                      <td><ul class="todo-list"><li><span class="text">{{$data->tgl_daftar}}</span></li></ul></td>
                    </tr>
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Waktu Pendaftaran</span></li></ul></td>
                      <td><ul class="todo-list"><li><span class="text">{{$data->waktu}}</span></li></ul></td>
                    </tr>
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Lokasi Pendaftaran</span></li></ul></td>
                      <td><ul class="todo-list"><li><span class="text">{{$data->lokasi}}</span></li></ul></td>
                    </tr>
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Syarat Pendaftaran</span></li></ul></td>
                      <td><button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#syarat{{$data->id}}"><span class="fa fa-eye"></span>&nbsp &nbsp Lihat Persyaratan</button>
                      <div class="modal modal-default fade" id="syarat{{$data->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Syarat Pendaftaran</h4>
                            </div>
                            <div class="modal-body">
                              <textarea class="form-control">{{$data->syarat}}</textarea>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div> </td>
                    </tr>
                    <tr>
                      <td></td>
                      {!! Form::model($data, ['url'=>route('info.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
                      {!! Form::close() !!}
                      <td><button id="delete" class="btn btn-danger pull-right"><span class="fa fa-trash"></span> Tutup Pendaftaran</button></td>
                    </tr>
                  </table>
                </div>
              </center>

              @endforeach
              @endif
              @if($info->count() == 0)
              <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#daftar">Buka Pendaftaran</button>
              @endif
            </div>
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Agenda Kegiatan Sekolah</h3>

              <div class="box-tools pull-right">
                {{ $agenda->links() }}

              </div>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                @foreach($agenda as $data)
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  
                  <span class="text">{{$data->tanggal}} :</span>
                  <span class="text">{{$data->kegiatan}}</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#agenda"><i class="fa fa-plus"></i> Tambah Kegiatan</button>
            </div>
          </div>
        </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

<div class="modal modal-warning fade" id="daftar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Informasi Pendaftaran</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('info.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('tgl_daftar') ? 'has-error' : '' }}">
                      {!! Form::label('tgl_daftar','Tanggal Pendaftaran *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('tgl_daftar',null,['class'=>'form-control','required','placeholder'=>'Contoh : 12 - 30 Juni 2018']) !!}
                        {!! $errors->first('tgl_daftar', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('waktu') ? 'has-error' : '' }}">
                      {!! Form::label('waktu','Waktu Pendaftaran *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('waktu',null,['class'=>'form-control','required','placeholder'=>'Contoh : 08.00 - 14.00 WIB']) !!}
                        {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('lokasi') ? 'has-error' : '' }}">
                      {!! Form::label('lokasi','Lokasi Pendaftaran *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('lokasi',null,['class'=>'form-control','required','placeholder'=>'Contoh : Kampus SMK Assalaam']) !!}
                        {!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('syarat') ? 'has-error' : '' }}">
                      {!! Form::label('syarat','Persyaratan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('syarat',null,['class'=>'form-control','required','placeholder'=>'']) !!}
                        {!! $errors->first('syarat', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                {!! Form::submit('Simpan', ['class'=>'btn btn-warning']) !!}
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<div class="modal modal-primary fade" id="agenda">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Kegiatan Sekolah</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('agenda.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('tanggal') ? 'has-error' : '' }}">
                      {!! Form::label('tanggal','Tanggal Kegiatan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('tanggal',null,['class'=>'form-control','required','placeholder'=>'Contoh : 12 - 30 Juni 2018']) !!}
                        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('kegiatan') ? 'has-error' : '' }}">
                      {!! Form::label('kegiatan','Nama Kegiatan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('kegiatan',null,['class'=>'form-control','required','placeholder'=>'Contoh : Peringatan Hari Sumpah Pemuda']) !!}
                        {!! $errors->first('kegiatan', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                      {!! Form::label('keterangan','Keterangan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('keterangan',null,['class'=>'form-control','required','placeholder'=>'']) !!}
                        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
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

        

  <script type="text/javascript">
  $('button#delete').on('click', function(){
  swal({   
    title: "Apakah Anda Yakin ?",
    text: "Informasi Pendaftaran Akan Terhapus !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Tutup Pendaftaran !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>
@endsection
