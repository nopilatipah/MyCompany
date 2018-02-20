@extends('layouts.user')

@section('content')
@php
$kategori = App\KategoriEkskul::all();
@endphp
<div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-primary">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Ekstrakurikuler {{$komponen->nama_sekolah}}</h1>
            <button class="btn btn-raised btn-primary" id="all">Semua</button>
            @foreach($kategori as $data)
            <button class="btn btn-raised btn-primary" id="filter_{{$data->id}}" value="{{$data->id}}">{{$data->nama}}</button>
            @endforeach
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center card-top" id="content">
        @if($ekskul->count() == 0)
          <div class="col-lg-12">
            <div class="card card-warning wow zoomInUp mb-4 animation-delay-5">
                <center>
                <h3><b><i>Kategori Tidak Ditemukan</i></b></h3>
                </center>
            </div>
          </div>
        @endif
        
        </div>
      </div>
      
@endsection

@push('js')

@if($ekskul->count() > 0)

          
<script type="text/javascript">
  function all(){
    $('#content').html("");
    $.ajax({
        dataType:"json",
        url:"{{url('/ekstrakurikuler/all')}}",
        success: function (data) {
          $.each(data,function (i,value) {
            var html = 
            '<div class="col-lg-4 col-md-6">'+
              '<div class="card card-primary wow zoomInUp mb-4 animation-delay-5">'+
                '<div class="ms-thumbnail-container wow fadeInUp">'+
                    '<figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">'+
                      '<img src="/img/'+value.foto+'" alt="" class="img-fluid">'+
                      '<figcaption class="ms-thumbnail-caption text-center">'+
                        '<div class="ms-thumbnail-caption-content">'+
                          '<h3 class="ms-thumbnail-caption-title">'+ value.nama +'</h3>'+
                          '<button data-toggle="modal" data-target="#myModal'+value.id+'" class="btn btn-primary btn-raised">Lihat</button>'+
                        '</div>'+
                      '</figcaption>'+
                    '</figure>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="modal modal-primary" id="myModal'+value.id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'+
              '<div class="modal-dialog modal-lg animated zoomIn animated-3x" role="document">'+
                  '<div class="modal-content">'+
                  '<div class="modal-header">'+
                  '<h3 class="modal-title" id="myModalLabel6">Ekstrakurikuler '+value.nama+'</h3>'+
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                      '<span aria-hidden="true">'+
                        '<i class="zmdi zmdi-close"></i>'+
                      '</span>'+
                    '</button>'+
                    '</div>'+
                      '<div class="modal-body">'+
                        '<img src="/img/'+value.foto+'" class="img-responsive img-rounded" width="750px">'+
                      '</div>'+
                      
                  '</div>'+
              '</div>'+
          '</div>';
          $('#content').append(html);
          })
        }
      })
  }

  $('#all').click(function(){
      all();
  });

    @foreach($kategori as $data)
    $('#filter_{{$data->id}}').click(function () {
      $('#content').html("");
      var id= $(this).val();
      $.ajax({
        dataType:"json",
        url:"{{url('/ekstrakurikuler')}}"+'/'+ id,
        success: function (data) {
          $.each(data,function (i,value) {
            var html = 
            '<div class="col-lg-4 col-md-6">'+
              '<div class="card card-primary wow zoomInUp mb-4 animation-delay-5">'+
                '<div class="ms-thumbnail-container wow fadeInUp">'+
                    '<figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">'+
                      '<img src="/img/'+value.foto+'" alt="" class="img-fluid">'+
                      '<figcaption class="ms-thumbnail-caption text-center">'+
                        '<div class="ms-thumbnail-caption-content">'+
                          '<h3 class="ms-thumbnail-caption-title">'+ value.nama +'</h3>'+
                          '<button data-toggle="modal" data-target="#myModal'+value.id+'" class="btn btn-primary btn-raised">Lihat</button>'+
                        '</div>'+
                      '</figcaption>'+
                    '</figure>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="modal" id="myModal'+value.id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'+
              '<div class="modal-dialog modal-lg animated zoomIn animated-3x" role="document">'+
                  '<div class="modal-content">'+
                      '<div class="modal-body">'+
                        '<img src="/img/'+value.foto+'" class="img-responsive img-rounded" width="750px">'+
                      '</div>'+
                      
                  '</div>'+
              '</div>'+
          '</div>';
          $('#content').append(html);
          })
        }
      })
    });
  @endforeach
  $(document).ready(function() {
      all()
  });
</script>
@endif
@endpush