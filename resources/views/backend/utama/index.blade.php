@extends('layouts.admin')

@section('header')

<style>
  #map-canvas{
    width: 1080px;
    height: 400px;
  }

  .company-social {
  margin-left: 0;
  padding-left: 0;
  margin-top: 10px;
}

.company-social {
  text-align: left;
  list-style: none;
}

.company-social li{
  margin:0;
  padding:0;
  display: inline-block;
}

.company-social a{
  margin:0 2px 0 0;
}

.company-social a:hover {
    color: #fff;
}

.company-social a i {
  width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
  color: #fff;
    -webkit-transition: background .3s ease-in-out;
    transition: background .3s ease-in-out;
  text-align: center;
  border-radius: 3px;
  padding:0;
}

.company-social .social-facebook a i{background: #3873ae;}
.company-social .social-twitter a i{background: #62c6f8;}
.company-social .social-dribble a i{background: #d74980;}
.company-social .social-deviantart a i{background: #8da356;}
.company-social .social-fax a i {background: gray;}
.company-social .social-vimeo a i {background: #51a6d3;}
.company-social .social-whatsapp a i {background: green;}

.company-social .social-facebook a:hover i {background: #4893ce;}
.company-social .social-twitter a:hover i {background: #82e6ff;}
.company-social .social-dribble a:hover i {background: #f769a0;}
.company-social .social-deviantart a:hover i {background: #adc376;}
.company-social .social-fax a:hover i {background: #333;}
.company-social .social-vimeo a:hover i {background: #71c6f3;}

</style>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrmOH1T0Znrn7UqKm8mxNU0c4au_SWIFo&amp;libraries=places"></script>

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
        <li  class="active"><a href="{{ route('utama.index') }}"><i class="fa fa-laptop"></i> <span>Tampilan Utama</span></a></li>
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
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                Identitas Sekolah
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Identitas">
                  <i class="fa fa-edit"></i> Ubah</button>
              </div>
              <hr>
              <center>
              <h3>{{$komponen->nama_sekolah}}</h3>
              <h4>{{$komponen->deskripsi}} - Terakreditasi {{$komponen->akreditasi}}</h4>
              </center>

              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                  <center>
                  <img src="{{asset('img/'.$komponen->logo)}}" class="img-responsive" style="height: 285px">
            </center>
            </div>
          </div>
          <!-- /.box -->
          </div>

          <div class="modal modal-default fade" id="Identitas">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Identitas Sekolah</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($komponen, ['url'=>route('utama.update',$komponen->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('nama_sekolah') ? 'has-error' : '' }}">
                      {!! Form::label('nama_sekolah','Nama Sekolah *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('nama_sekolah',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('nama_sekolah', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                      {!! Form::label('deskripsi','Deskripsi Sekolah *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('deskripsi',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('logo','akreditasi') ? 'has-error' : '' }}">
                            {!! Form::label('logo','Logo Sekolah *',['class'=>'col-md-7']) !!}
                            {!! Form::label('akreditasi','Terakreditasi *',['class'=>'col-md-3']) !!}
                            <div class="col-md-2">
                            {!! Form::text('akreditasi',null,['class'=>'form-control','required']) !!}
                            </div>
                                <div class="col-md-6">
                                @if(isset($komponen) && $komponen->logo)
                                    {!! Html::image(asset('img/'.$komponen->logo),null,['class'=>'img-rounded img-responsive']) !!}
                      
                                @endif
                                    <input type="file" name="logo" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('logo','<p class="help-block">:message</p>') !!}

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

          <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                Foto Utama Beranda
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
                  <img src="{{asset('img/'.$komponen->foto_utama)}}" class="img-responsive" style="height: 350px">
            </center>
            </div>
          </div>
          <!-- /.box -->
          </div>
          </div>

          <div class="modal modal-default fade" id="Beranda">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Foto Utama Beranda</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($komponen, ['url'=>route('utama.update',$komponen->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('foto_utama') ? 'has-error' : '' }}">
                            {!! Form::label('foto_utama','Foto Utama Beranda *',['class'=>'col-md-12']) !!}
                                <div class="col-md-7 col-md-offset-2">
                                @if(isset($komponen) && $komponen->foto_utama)
                                    {!! Html::image(asset('img/'.$komponen->foto_utama),null,['class'=>'img-rounded img-responsive']) !!}
                      
                                @endif
                                    <input type="file" name="foto_utama" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('foto_utama','<p class="help-block">:message</p>') !!}

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

          <div class="row">
        <div class="col-md-6">
          <div class="box box-info" style="height: 370px">
            <div class="box-header">
              <h3 class="box-title">
                Kontak & Media Sosial
                <small>Footer</small>
              </h3>
              <!-- tools box -->
              
              <hr>
              <div class="col-md-6">
              <ul class="company-social">
                <li class="social-facebook"><a href="" data-toggle="modal" data-target="#fb"><i class="fa fa-facebook"></i></a> {{$fb->kontak}}</li><br><br>
                <li class="social-twitter"><a href="" data-toggle="modal" data-target="#tw"><i class="fa fa-twitter"></i></a> {{$tw->kontak}}</li><br><br>
                <li class="social-fax"><a href="" data-toggle="modal" data-target="#fx"><i class="fa fa-fax"></i></a> {{$fx->kontak}}</li><br><br>
              </ul>
              </div>
              <div class="col-md-6">
              <ul class="company-social">
                <li class="social-vimeo"><a href="" data-toggle="modal" data-target="#yt"><i class="fa fa-youtube"></i></a> {{$yt->kontak}}</li><br><br>
                <li class="social-dribble"><a href="" data-toggle="modal" data-target="#ig"><i class="fa fa-instagram"></i></a> {{$ig->kontak}}</li><br><br>
                <li class="social-whatsapp"><a href="" data-toggle="modal" data-target="#wa"><i class="fa fa-whatsapp"></i></a> {{$wa->kontak}}</li><br><br>
              </ul>
              </div>
              <br>
              <center>
              <a href="" data-toggle="modal" data-target="#email"><span class="alert alert-info">Email : {{$email->kontak}}</span></a>
              <a href="" data-toggle="modal" data-target="#tlp">
              <span class="alert alert-info">Telepon : {{$tlp->kontak}}</span></a>
              </center>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                  <div class="widget">
                        
                    </div>
            </div>
          </div>
          <!-- /.box -->
          </div>

          <div class="col-md-6">
          <div class="box box-info" style="height: 220px">
            <div class="box-header">
              <h3 class="box-title">
                Tentang Sekolah
                <small>Footer</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tentang">
                  <i class="fa fa-edit"></i> Ubah</button>
              </div>
              <hr>
              <p>{{$komponen->tentang}}</p>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            
            
            </div>
          </div>
          <!-- /.box -->

          <div class="box box-info" style="height: 130px">
            <div class="box-header">
              <h3 class="box-title">
                Top Area
                <small>Header</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#top">
                  <i class="fa fa-edit"></i> Ubah</button>
              </div>
              <hr>
              <p>{{$komponen->motto}}</p>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            
            
            </div>
          </div>
          </div>
          </div>


          <div class="box box-info">
            <div class="box-header">
              
              <h3 class="box-title">Lokasi
                <small>SMK Assalaam Bandung</small>
              </h3>
              <a href="{{ route('maps.edit',1) }}" class="btn btn-primary pull-right">Ubah Lokasi</a>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <p>Alamat : {{$vendor->lokasi}}</p>
                <div id="map-canvas"></div>
            </div>
              
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->

    <div class="modal modal-default fade" id="tentang">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Tentang Sekolah</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($komponen, ['url'=>route('utama.update',$komponen->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('tentang') ? 'has-error' : '' }}">
                      {!! Form::label('tentang','Tentang Sekolah *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::textarea('tentang',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('tentang', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="top">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Tentang Sekolah</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($komponen, ['url'=>route('utama.update',$komponen->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('motto') ? 'has-error' : '' }}">
                      {!! Form::label('motto','Top Area *',['class'=>'col-md-3']) !!}
                      <div class="col-md-9">
                        {!! Form::text('motto',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('motto', '<p class="help-block">:message</p>') !!}
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

           
          <div class="modal modal-default fade" id="fb">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Akun Facebook</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($fb, ['url'=>route('kontak.update',$fb->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Facebook *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('link') ? 'has-error' : '' }}">
                      {!! Form::label('link','Link *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('link',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="tw">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Akun Twitter</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($tw, ['url'=>route('kontak.update',$tw->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Twitter *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('link') ? 'has-error' : '' }}">
                      {!! Form::label('link','Link *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('link',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="yt">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Akun Youtube</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($yt, ['url'=>route('kontak.update',$yt->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Youtube *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('link') ? 'has-error' : '' }}">
                      {!! Form::label('link','Link *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('link',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="ig">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Akun Instagram</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($ig, ['url'=>route('kontak.update',$ig->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Instagram *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('link') ? 'has-error' : '' }}">
                      {!! Form::label('link','Link *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('link',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="fx">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Nomor Fax</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($fx, ['url'=>route('kontak.update',$fx->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Fax *',['class'=>'col-md-3']) !!}
                      <div class="col-md-9">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="wa">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Nomor Whatsapp</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($wa, ['url'=>route('kontak.update',$wa->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Whatsapp *',['class'=>'col-md-3']) !!}
                      <div class="col-md-9">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="email">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Alamat Email</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($email, ['url'=>route('kontak.update',$email->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Alamat Email *',['class'=>'col-md-3']) !!}
                      <div class="col-md-9">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
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

          <div class="modal modal-default fade" id="tlp">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Nomor Telepon</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($tlp, ['url'=>route('kontak.update',$tlp->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('kontak') ? 'has-error' : '' }}">
                      {!! Form::label('kontak','Nomor Telepon *',['class'=>'col-md-3']) !!}
                      <div class="col-md-9">
                        {!! Form::text('kontak',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
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

    <script>

      var lat = {{ $vendor->lat }};
      var lng = {{ $vendor->lng }};

      var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
          lat: lat,
          lng: lng
        },
        zoom:15
      });

      var marker = new google.maps.Marker({
        position: {
          lat: lat,
          lng: lng
        },
        map: map
      });
      
    </script>
  
@endsection
