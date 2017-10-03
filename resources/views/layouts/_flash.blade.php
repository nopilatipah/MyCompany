@if (session()->has('flash_notification.message'))
	<div class="col-md-12">
		<div class="alert alert-{{ session()->get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-tag"></i> Pemberitahuan</h4>
          	{!! session()->get('flash_notification.message') !!}
        </div>
	</div>
@endif