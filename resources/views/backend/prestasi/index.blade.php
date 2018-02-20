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
            <li><a href="{{ route('kejuruan.index') }}"><i class="fa fa-circle-o"></i> Kejuruan</a></li>
            <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a></li>
            <li class="active"><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i> Prestasi</a></li>
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
        <li class="active"><a href="{{ route('prestasi.index') }}"><i class="fa fa-laptop"></i> <span>Prestasi</span></a></li>
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
          <div class="box box-info">
            <div class="box-header">
              @php
              $jml = $kejuruans->count();
              @endphp
              <h3 class="box-title">Total Prestasi ( {{$jml}} )
                <small>SMK Assalaam Bandung</small>
                
              </h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-info">
              <span class="fa fa-plus"></span>
                &nbsp &nbsp Tambah Prestasi
              </button> 
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
              <div class="col-md-10 col-md-offset-1">
               <!-- tabel akun -->
               <table class="table table-striped custab">
                  <thead>
                  
                      <tr>
                   <th>No</th>
                   <th>Foto Prestasi</th>
                   <th>Judul</th>
                   <th>Keterangan</th>
                   <th colspan="2">Opsi</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($kejuruans as $data)
                  <tr>
                    <td>{{$no}}</td>
                    <td><img src="{{asset('img/'.$data->gambar)}}" class="img-responsive img-thumbnail" alt="" style="height: 40px;"></td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->keterangan}}</td>
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
                            <h4 class="modal-title">Ubah Data Prestasi</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::model($data,['url'=>route('prestasi.update',$data->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                                
                                
                                <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Judul Prestasi *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Contoh : Juara 1 LKS Programming']) !!}
                                    {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Keterangan Prestasi *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::textarea('keterangan',null,['class'=>'form-control','size'=>'5x3']) !!}
                                    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('gambar') ? 'has-error' : '' }}">
                            {!! Form::label('gambar','Foto Prestasi *',['class'=>'col-md-4']) !!}
                                <div class="col-md-8">
                                @if(isset($data) && $data->gambar)
                                <p>
                                    {!! Html::image(asset('img/'.$data->gambar),null,['class'=>'img-rounded img-responsive','style'=>'height:170px']) !!}
                                </p>
                                @endif
                                    <input type="file" name="gambar" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('gambar','<p class="help-block">:message</p>') !!}
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
                    {!! Form::model($data, ['url'=>route('prestasi.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
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
                {{ $kejuruans->links() }}
                </div>
            </div>
             
            </div>
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

    <div class="modal modal-default fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Prestasi Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('prestasi.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                      {!! Form::label('judul','Judul Prestasi *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Contoh : Juara 1 LKS Programming']) !!}
                        {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                      {!! Form::label('keterangan','Keterangan Prestasi *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('keterangan',null,['class'=>'form-control','size'=>'5x3']) !!}
                        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('gambar') ? 'has-error' : '' }}">
                      {!! Form::label('gambar','Foto Prestasi *',['class'=>'col-md-4']) !!}
                        <div class="col-md-8">
                          @if(isset($prestasi) && $prestasi->gambar)
                            <p>
                              {!! Html::image(asset('img/'.$prestasi->gambar),null,['class'=>'img-rounded img-responsive']) !!}
                            </p>
                          @endif
                          <input type="file" name="gambar" class="btn btn-default btn-block" required=""></input>
                          {!! $errors->first('gambar','<p class="help-block">:message</p>') !!}
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
    text: "Anda Tidak Dapat Mengembalikan Data Prestasi !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus Prestasi !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>
@endsection
