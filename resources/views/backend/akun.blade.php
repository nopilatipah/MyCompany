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
              <h3 class="box-title">Pengaturan Akun
                <small>SMK Assalaam Bandung</small>
                
              </h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit{{Auth::user()->id}}">
              <span class="fa fa-edit"></span>
                &nbsp &nbsp Ubah Profil
              </button> 
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="col-md-3 col-md-offset-2">
                    <center>
                      <p>
                        {!! Html::image(asset('img/'.$user->avatar),null,['class'=>'img-thumbnail img-responsive','style'=>'height:240px']) !!}
                      </p>
                    </center>
              </div>
              <div class="col-md-5">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Nama Pengguna</span></li></ul></td>
                      <td><ul class="todo-list"><li><span class="text">{{ Auth::user()->name }}</span></li></ul></td>
                    </tr>
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Alamat E-mail</span></li></ul></td>
                      <td><ul class="todo-list"><li><span class="text">{{ Auth::user()->email }}</span></li></ul></td>
                    </tr>
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Hak Akses</span></li></ul></td>
                      <td><ul class="todo-list"><li><span class="text">{{ Auth::user()->akses }}</span></li></ul></td>
                    </tr>
                    <tr>
                      <td><ul class="todo-list"><li><span class="text">Kata Sandi</span></li></ul></td>
                      <td><button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#editpass"><span class="fa fa-edit"></span>&nbsp &nbsp Ubah Kata Sandi</button> </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
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

                    <div class="modal modal-primary fade" id="edit{{Auth::user()->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Akun</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::model(auth()->user(),['url'=>url('/akun/editprofil'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                  {!! Form::label('name','Nama Pengguna *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Contoh : Raihan Herdiansyah']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                                  {!! Form::label('email','Alamat Email *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'Contoh : Admin@admin.com']) !!}
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('role') ? 'has-error' : '' }}">
                                  {!! Form::label('role','Hak Akses *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    <select name="role" class="js-selectize" placeholder="Pilih Hak Akses" required="">
                                    <option></option>
                                      @php
                                        $hak = App\Role::all();
                                        $role = DB::table('role_user')->where('user_id',$user->id)->first();
                                      @endphp
                                      @foreach($hak as $kk)
                                      <option value="{{$kk->id}}" <?php if($kk->id == $role->role_id) echo 'selected' ?>>{{$kk->display_name}}</option>
                                      @endforeach
                                    </select>
                                    {!! $errors->first('rore', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>

                                <div class="form-group{{ $errors->has('avatar') ? 'has-error' : '' }}">
                                {!! Form::label('avatar','Foto Profil *',['class'=>'col-md-4']) !!}
                                    <div class="col-md-8">
                                    @if(isset($user) && $user->avatar)
                                    <p>
                                      <center>
                                        {!! Html::image(asset('img/'.$user->avatar),null,['class'=>'img-rounded img-responsive','style'=>'height:200px']) !!}
                                      </center>
                                    </p>
                                    @endif
                                        <input type="file" name="avatar" class="btn btn-default btn-block" required=""></input>
                                        {!! $errors->first('avatar','<p class="help-block">:message</p>') !!}
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



                     <div class="modal modal-warning fade" id="editpass">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Kata Sandi</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::open(['url'=>url('akun/editpass'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                                  {!! Form::label('password','Kata Sandi Lama *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::password('password',['class'=>'form-control','required','placeholder'=>'Masukan Kata Sandi Lama Anda']) !!}
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('new_password') ? 'has-error' : '' }}">
                                  {!! Form::label('new_password','Kata Sandi Baru *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::password('new_password',['class'=>'form-control','required','placeholder'=>'Masukan Kata Sandi Baru Anda']) !!}
                                    {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                                  </div>
                                </div>
                                <div class="form-group{{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                                  {!! Form::label('new_password_confirmation','Konfirmasi *',['class'=>'col-md-4']) !!}
                                  <div class="col-md-8">
                                    {!! Form::password('new_password_confirmation',['class'=>'form-control','required','placeholder'=>'Konfirmasi Kata Sandi Baru Anda']) !!}
                                    {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
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

      
<script type="text/javascript">
  $('button#delete').on('click', function(){
  swal({   
    title: "Apakah Anda Yakin ?",
    text: "Anda Tidak Dapat Mengembalikan Data Ekstrakurikuler !",         type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus Ekstrakurikuler !", 
    closeOnConfirm: false 
  }, 
       function(){   
    $("#myform").submit();
  });
})
</script>
@endsection
