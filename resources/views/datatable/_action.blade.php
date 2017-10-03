{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'class'=>'form-inline js-confirm', 'data-confirm'=>$confirm_message]) !!}
	<a class="btn btn-xs btn-warning" href="{{ $edit_url }}"><span class="fa fa-edit"></span> Ubah</a> |
	{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}