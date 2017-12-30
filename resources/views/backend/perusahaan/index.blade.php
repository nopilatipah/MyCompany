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
        <li class="active"><a href="{{ route('kejuruan.index') }}"><i class="fa fa-laptop"></i> <span>Kejuruan</span></a></li>
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

          <div class="box box-info">
            <div class="box-header">
              
              <h3 class="box-title">Daftar Perusahaan
                <small>Kerja Sama</small>
                
              </h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-info">
              <span class="fa fa-plus"></span>
               &nbsp &nbsp Tambah Perusahaan
              </button> 
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              @php
              $kejuruan = App\Kejuruan::all();
              @endphp
              <a href="{{route('perusahaan.index')}}" class="btn btn-info">Semua</a>
              @foreach($kejuruan as $kej)
              <a href="{{url('/admin/perusahaans',$kej->id)}}" class="btn btn-info">{{$kej->nama}}</a>
              @endforeach
              
              <div class="col-md-10 col-md-offset-1">
               <!-- tabel akun -->
               <table class="table table-striped custab">
                  <thead>
                  
                      <tr>
                   <th>No</th>
                   <th>Logo</th>
                   <th>Nama Perusahaan</th>
                   <th colspan="2">Opsi</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($perusahaan as $data)
                  <tr>
                    <td>{{$no}}</td>
                    <td><img src="{{asset('img/'.$data->logo)}}" class="img-responsive img-thumbnail" alt="" style="height: 40px;"></td>
                    <td>{{$data->nama}}</td>
                    <td>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$data->id}}">
                    <span class="fa fa-edit"></span>
                      Ubah
                    </button>
                    <div class="modal modal-warning fade" id="edit{{$data->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Data Perusahaan</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::model($data,['url'=>route('perusahaan.update',$data->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Nama Perusahaan *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('nama',null,['class'=>'form-control','required','placeholder'=>'Contoh : PT. Putra Jaya']) !!}
                                    {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('kejuruan_id') ? 'has-error' : '' }}">
                                  {!! Form::label('kejuruan_id','Kejuruan *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    <select name="kejuruan_id" class="js-selectize" placeholder="Pilih Kejuruan" required="">
                                    <option></option>
                                      @php
                                        $hak = App\Kejuruan::all();
                                        $kj = DB::table('perusahaans')->where('kejuruan_id',$data->kejuruan_id)->first();
                                      @endphp
                                      @foreach($hak as $kk)
                                      <option value="{{$kk->id}}" <?php if($kk->id == $kj->kejuruan_id) echo 'selected' ?>>{{$kk->nama}}</option>
                                      @endforeach
                                    </select>
                                    {!! $errors->first('rore', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('logo') ? 'has-error' : '' }}">
                            {!! Form::label('logo','Logo Perusahaan *',['class'=>'col-md-4']) !!}
                                <div class="col-md-8">
                                @if(isset($data) && $data->logo)
                                <p>
                                    {!! Html::image(asset('img/'.$data->logo),null,['class'=>'img-rounded img-responsive','style'=>'height:170px']) !!}
                                </p>
                                @endif
                                    <input type="file" name="logo" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('logo','<p class="help-block">:message</p>') !!}
                                    <font color="white" size="2">* Disarankan : Ukuran 250 x 250 px (Maksimal 1.5 Mb)</font>
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
                    {!! Form::model($data, ['url'=>route('perusahaan.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
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
                <div class="pull-right">
                {{ $perusahaan->links() }}
                </div>
            </div>
             
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
                <h4 class="modal-title">Tambah Perusahaan Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('perusahaan.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                      {!! Form::label('nama','Nama Perusahaan *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('nama',null,['class'=>'form-control','required','placeholder'=>'Contoh : PT. Putra Jaya']) !!}
                        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('kejuruan_id') ? 'has-error' : '' }}">
                                  {!! Form::label('kejuruan_id','Kejuruan *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    <select name="kejuruan_id" class="js-selectize" placeholder="Pilih Kejuruan" required="">
                                    <option></option>
                                      @php
                                        $hak = App\Kejuruan::all();
                                      @endphp
                                      @foreach($hak as $data)
                                      <option value="{{$data->id}}">{{$data->nama}}</option>
                                      @endforeach
                                    </select>
                                    {!! $errors->first('rore', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('logo') ? 'has-error' : '' }}">
                            {!! Form::label('logo','Logo Perusahaan *',['class'=>'col-md-4']) !!}
                                <div class="col-md-8">
                                @if(isset($ekskul) && $ekskul->logo)
                                <p>
                                    {!! Html::image(asset('img/'.$ekskul->logo),null,['class'=>'img-rounded img-responsive']) !!}
                                </p>
                                @endif
                                    <input type="file" name="logo" class="btn btn-default btn-block" required=""></input>
                                    {!! $errors->first('logo','<p class="help-block">:message</p>') !!}
                                    <font color="white" size="2">* Disarankan : Ukuran 250 x 250 px (Maksimal 1.5 Mb)</font>
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
    text: "Anda Tidak Dapat Mengembalikan Data Perusahaan !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus Perusahaan !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>
@endsection
