{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'class'=>'form-inline js-confirm', 'data-confirm'=>$confirm_message]) !!}
    <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Modal{{$modal}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
    {!! Form::submit('Hapus',['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}

<div class="modal modal-info fade" id="Modal{{$modal}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Akun</h4>
              </div>
              <div class="modal-body">
                {!! Form::model($model, ['url'=>route('akun.update',$modal), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                      {!! Form::label('name','Nama Pengguna *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                      {!! Form::label('email','Alamat Email *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::email('email',null,['class'=>'form-control','required']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('role') ? 'has-error' : '' }}">
                      {!! Form::label('role','Hak Akses *',['class'=>'col-md-12']) !!}
                      <div class="col-md-12">
                        {!! Form::select('role',App\Role::pluck('display_name','id')->all(),null,['class'=>'form-control','placeholder'=>'Pilih Hak Akses', 'required']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
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