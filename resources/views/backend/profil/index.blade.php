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
            <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
            <li><a href="{{ route('artikel.index') }}"><i class="fa fa-circle-o"></i> Artikel</a></li>
            <li><a href="{{ route('alumni.index') }}"><i class="fa fa-circle-o"></i> Testimoni</a></li>
          </ul>
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
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan Profil</button>
            </div>
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
          <div class="col-md-4">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                Foto Kepala Sekolah
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Beranda">
                  <i class="fa fa-edit"></i> Ubah</button>
              </div>
              <hr>

              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            <center>
                  <img src="{{asset('img/'.$profils->foto)}}" class="img-responsive" style="height: 320px">
            </center>
            </div>
          </div>
          <!-- /.box -->
          </div>
          <div class="col-md-8">
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
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan Sambutan</button>
            </div>
          </div>
          <!-- /.box -->
          </div>
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
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan Visi</button>
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
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan Misi</button>
            </div>
          </div>
          <!-- /.box -->
          </div>
          <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Sejarah
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

                <table class="table table-striped custab table-responsive">
                  <thead>
                  
                      <tr>
                   <th>No</th>
                   <th>Waktu</th>
                   <th>Judul</th>
                   <th>Keterangan</th>
                   <th colspan="2">Opsi</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($sejarah as $data)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$data->waktu}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{!! str_limit($data->keterangan, 50) !!}</td>
                    <td>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$data->id}}">
                    <span class="fa fa-edit"></span>
                      Ubah
                    </button>
                    <div class="modal modal-default fade" id="edit{{$data->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Data Riwayat</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::model($data,['url'=>route('sejarah.update',$data->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                                
                                <div class="form-group{{ $errors->has('waktu') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Waktu *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('waktu',null,['class'=>'form-control','required','placeholder'=>'Contoh : Tahun 2018']) !!}
                                    {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Judul Riwayat *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Contoh : Peresmian Jurusan Multimedia']) !!}
                                    {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Keterangan Riwayat *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::textarea('keterangan',null,['class'=>'form-control','required','size'=>'5x3']) !!}
                                    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
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
                    </div></td>
                    {!! Form::model($data, ['url'=>route('sejarah.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
                    {!! Form::close() !!}
                    <td>
                    <button id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                    
                  </tr>


                  @php
                  $no++;
                  @endphp

                  @endforeach
                  </thead>
                         
                  </table>
                  {{ $sejarah->links() }}
                <br>
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#sejarah"><i class="fa fa-plus"></i> Tambah Riwayat</button>
            </div>

          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Keunggulan
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

                <table class="table table-striped custab table-responsive">
                  <thead>
                  
                      <tr>
                   <th>No</th>
                   <th>Keunggulan</th>
                   <th colspan="2">Opsi</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($keunggulan as $data)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{!! str_limit($data->keunggulan, 100) !!}</td>
                    <td>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$data->id}}">
                    <span class="fa fa-edit"></span>
                      Ubah
                    </button>
                    <div class="modal modal-default fade" id="edit{{$data->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Keunggulan</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::model($data,['url'=>route('keunggulan.update',$data->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                                
                                <div class="form-group{{ $errors->has('waktu') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Waktu *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('waktu',null,['class'=>'form-control','required','placeholder'=>'Contoh : Tahun 2018']) !!}
                                    {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Judul Riwayat *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Contoh : Peresmian Jurusan Multimedia']) !!}
                                    {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Keterangan Riwayat *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::textarea('keterangan',null,['class'=>'form-control','required','size'=>'5x3']) !!}
                                    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
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
                    </div></td>
                    {!! Form::model($data, ['url'=>route('sejarah.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
                    {!! Form::close() !!}
                    <td>
                    <button id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                    
                  </tr>


                  @php
                  $no++;
                  @endphp

                  @endforeach
                  </thead>
                         
                  </table>
                  {{ $keunggulan->links() }}
                <br>
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#keunggulan"><i class="fa fa-plus"></i> Tambah Keunggulan</button>
            </div>
          </div>
          
          </div>

          <div class="col-md-12">
          <br>
          <button type="submit" class="btn btn-primary btn-lg btn-block pull-right"><i class="fa fa-save"></i> Simpan Semua Perubahan</button>
          </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

    <div class="modal modal-default fade" id="Beranda">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Foto Utama Beranda</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($profils, ['url'=>route('profil.update',$profils->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('foto') ? 'has-error' : '' }}">
                            {!! Form::label('foto','Foto Utama Beranda *',['class'=>'col-md-12']) !!}
                                <div class="col-md-6 col-md-offset-2">
                                
                                @if(isset($profils) && $profils->foto)
                                <center>
                                    {!! Html::image(asset('img/'.$profils->foto),null,['class'=>'img-rounded img-responsive','height'=>'50px']) !!}
                      
                                @endif
                                
                                    <input type="file" name="foto" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('foto','<p class="help-block">:message</p>') !!}
                                    </center>
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

{!! Form::close() !!}
  
<div class="modal modal-default fade" id="sejarah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Riwayat Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('sejarah.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    
                    <div class="form-group{{ $errors->has('waktu') ? 'has-error' : '' }}">
                      {!! Form::label('waktu','Waktu *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('waktu',null,['class'=>'form-control','required','placeholder'=>'26 April 2018']) !!}
                        {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                      {!! Form::label('judul','Judul Riwayat *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Pembukaan Jurusan RPL']) !!}
                        {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                      {!! Form::label('keterangan','Keterangan Riwayat *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('keterangan',null,['class'=>'form-control', 'size'=>'5x3']) !!}
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

<div class="modal modal-default fade" id="keunggulan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Keunggulan Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('keunggulan.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    
                    <div class="form-group{{ $errors->has('keunggulan') ? 'has-error' : '' }}">
                      {!! Form::label('keunggulan','Keunggulan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('keunggulan',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('keunggulan', '<p class="help-block">:message</p>') !!}
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
    text: "Anda Tidak Dapat Mengembalikan Data Riwayat !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus Riwayat !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>
@endsection
