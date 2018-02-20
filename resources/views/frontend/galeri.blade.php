@extends('layouts.user')

@section('content')
<script type="text/javascript" src="{{asset('js/instafeed.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<div class="container">
<div class="wow lightSpeedIn" data-wow-delay="0.1s">
  <div class="section-heading text-center">
    <h2 class="h-bold">Galeri SMK Assalaam Bandung <b></b></h2>
    <p>Instagram : <i>@SMKASSALAAM</i></p>
  </div>
</div>
<div class="divider-short"></div><br>
<div id="instafeed" class="row"></div>
</div>

<script type="text/javascript">
  $( document ).ready(function() {
  var userFeed = new Instafeed({
    get: 'user',
    userId: '6885603018',
    limit: 24,
    resolution: 'standard_resolution',
    accessToken: '6885603018.1677ed0.c249151918964b2b976ccd5c9c28a4ab',
    sortBy: 'most-recent',
    template: '<div class="col-md-3 gallery instaimg"><a href="'+image+'" title="" target="_blank"><img src="'+image+'" alt="" class="img-responsive"/></a></div>',
  });
  userFeed.run();

})
</script>
@endsection