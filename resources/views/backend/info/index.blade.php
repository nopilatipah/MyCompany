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
            <li class="active"><a href="{{ route('fasilitas.index') }}"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
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

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              @php
              $jml = $fasilitas->count();
              @endphp
              <h3 class="box-title">Total Fasilitas ( {{$jml}} )
                <small>SMK Assalaam Bandung</small>
                
              </h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-info">
              <span class="fa fa-plus"></span>
                &nbsp &nbsp Tambah Fasilitas
              </button> 
              <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#kategori">
              <span class="fa fa-list"></span>
                &nbsp &nbsp Kategori
              </button> 
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">

              @php
              $kat = App\KategoriFasilitas::all();
              @endphp
              <a href="{{route('fasilitas.index')}}" class="btn btn-info btn-sm">Semua</a>
              @foreach($kat as $kt)
              <a href="{{url('/admin/fasilitass',$kt->id)}}" class="btn btn-sm btn-info">{{$kt->nama}}</a>
              @endforeach
              
              <div class="col-md-10 col-md-offset-1">
               <!-- tabel akun -->
               <table class="table table-striped custab">
                  <thead>
                  
                      <tr>
                   <th>No</th>
                   <th>Foto Fasilitas</th>
                   <th>Judul</th>
                   <th>Keterangan</th>
                   <th colspan="2">Opsi</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($fasilitas as $data)
                  <tr>
                    <td>{{$no}}</td>
                    <td><img src="{{asset('img/'.$data->foto)}}" class="img-responsive img-thumbnail" alt="" style="height: 40px;"></td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->keterangan}}</td>
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
                            <h4 class="modal-title">Ubah Data Fasilitas</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::model($data,['url'=>route('fasilitas.update',$data->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                                
                                <div class="form-group{{ $errors->has('kategori') ? 'has-error' : '' }}">
                                  {!! Form::label('kategori','Kategori Fasilitas *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    <select name="kategori" class="js-selectize" placeholder="Pilih Kategori" required="">
                                    <option></option>
                                      @php
                                        $hak = App\KategoriFasilitas::all();
                                        $kj = DB::table('fasilitas')->where('kategori',$data->kategori)->first();
                                      @endphp
                                      @foreach($hak as $kk)
                                      <option value="{{$kk->id}}" <?php if($kk->id == $kj->kategori) echo 'selected' ?>>{{$kk->nama}}</option>
                                      @endforeach
                                    </select>
                                    {!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Judul Fasilitas *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Contoh : Proyektor Tiap Kelas']) !!}
                                    {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Keterangan Fasilitas *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::textarea('keterangan',null,['class'=>'form-control','required','size'=>'5x3']) !!}
                                    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('foto') ? 'has-error' : '' }}">
                            {!! Form::label('foto','Foto Fasilitas *',['class'=>'col-md-4']) !!}
                                <div class="col-md-8">
                                @if(isset($data) && $data->foto)
                                <p>
                                    {!! Html::image(asset('img/'.$data->foto),null,['class'=>'img-rounded img-responsive','style'=>'height:170px']) !!}
                                </p>
                                @endif
                                    <input type="file" name="foto" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('foto','<p class="help-block">:message</p>') !!}
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
                    {!! Form::model($data, ['url'=>route('fasilitas.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
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
                {{ $fasilitas->links() }}
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

    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Fasilitas Baru</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>route('fasilitas.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    

                    <div class="form-group{{ $errors->has('kategori') ? 'has-error' : '' }}">
                                  {!! Form::label('kategori','Kategori Fasilitas *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    <select name="kategori" class="js-selectize" placeholder="Pilih Kategori Fasilitas" required="">
                                    <option></option>
                                      @php
                                        $hak = App\KategoriFasilitas::all();
                                      @endphp
                                      @foreach($hak as $data)
                                      <option value="{{$data->id}}">{{$data->nama}}</option>
                                      @endforeach
                                    </select>
                                    {!! $errors->first('rore', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                    <div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
                      {!! Form::label('judul','Judul Fasilitas *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::text('judul',null,['class'=>'form-control','required','placeholder'=>'Proyektor Tiap Kelas']) !!}
                        {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
                      {!! Form::label('keterangan','Keterangan Fasilitas *',['class'=>'col-md-4']) !!}
                      <div class="col-md-8">
                        {!! Form::textarea('keterangan',null,['class'=>'form-control', 'size'=>'5x3']) !!}
                        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('foto') ? 'has-error' : '' }}">
                            {!! Form::label('foto','Foto Fasilitas *',['class'=>'col-md-4']) !!}
                                <div class="col-md-8">
                                @if(isset($data) && $data->foto)
                                <p>
                                    {!! Html::image(asset('img/'.$data->foto),null,['class'=>'img-rounded img-responsive','style'=>'height:170px']) !!}
                                </p>
                                @endif
                                    <input type="file" name="foto" class="btn btn-default btn-block"></input>
                                    {!! $errors->first('foto','<p class="help-block">:message</p>') !!}
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

        <div class="modal modal-default fade" id="kategori">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kategori Fasilitas</h4>
              </div>
              <div class="modal-body">
                @php
                $kat = App\KategoriFasilitas::all();
                @endphp
                {!! Form::open(['url'=>route('kategori-fasilitas.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
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
                    {!! Form::model($data, ['url'=>route('kategori-fasilitas.destroy',$data->id), 'method'=>'delete', 'id'=>'myform']) !!}
                    <p class="col-sm-4"><span class="fa fa-tag"></span> {{$data->nama}}
                    <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </p>
                    {!! Form::close() !!}
                    @endforeach
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              </div>
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
  <script type="text/javascript">
  $('button#delete').on('click', function(){
  swal({   
    title: "Apakah Anda Yakin ?",
    text: "Anda Tidak Dapat Mengembalikan Data Fasilitas !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus Fasilitas !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>
@endsection
