@extends('layouts.user')

@section('content') 
@php
$komponen = App\Komponen::find(1);
@endphp
<header class="ms-hero bg-primary-dark pb-4 pt-4 mb-6">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">
              <span>Daftar Kejuruan {{$komponen->nama_sekolah}}</span>
            </h1>
          </div>
        </div>
      </header>
      <div class="container mt-6">
        <div class="panel panel-light panel-flat">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-3" role="tablist">
            @foreach($kejuruan as $data)
            <li class="nav-item wow fadeInDown animation-delay-6" role="presentation">
              <a href="#{{$data->id}}" aria-controls="windows" role="tab" data-toggle="tab" class="nav-link withoutripple">
                <i class="zmdi zmdi-tag"></i>
                <span class="d-none d-md-inline">{{$data->nama}}</span>
              </a>
            </li>
            @endforeach
          </ul>
          <div class="panel-body">
            <!-- Tab panes -->
            
            <div class="tab-content mt-5">
              @foreach($kejuruan as $data)
              <div role="tabpanel" class="tab-pane fade" id="{{$data->id}}">
                <div class="row">
                  <div class="col-lg-6 order-lg-2">
                    <center>
                    <img src="{{asset('img/'.$data->siswa)}}" alt="" class="img-fluid animated zoomIn animation-delay-8" width="400px"></center> </div>
                  <div class="col-lg-6 order-lg-1">
                    <h3 class="text-normal animated fadeInUp animation-delay-4">{{$data->nama}}</h3>
                    <p class="lead lead-md animated fadeInUp animation-delay-6">{!!$data->profil!!}</p>
                    <div class="">
                      <button type="button" class="btn btn-primary btn-raised" data-toggle="modal" data-target="#myModal{{$data->id}}">
                      <i class="zmdi zmdi-info"></i>Target Pembelajaran
                      </button>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal modal-default" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog animated zoomIn animated-3x" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title color-primary" id="myModalLabel">{{$data->nama}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                        </div>
                        <div class="modal-body">
                            {!!$data->program!!}
                        </div>
                        
                    </div>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
        <!-- panel -->
      </div>
@endsection