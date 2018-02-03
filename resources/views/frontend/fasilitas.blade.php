@extends('layouts.user')

@section('content') 
@php
$kategori = App\KategoriFasilitas::all();
@endphp
<div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-primary">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Fasilitas {{$komponen->nama_sekolah}}</h1>
            @foreach($kategori as $data)
            <a href="{{url('/fasilitas/'.$data->id)}}" class="btn btn-raised btn-primary">{{$data->nama}}</a>
            @endforeach
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center card-top">
        @if($fasilitas->count() == 0)
          <div class="col-lg-12">
            <div class="card card-warning wow zoomInUp mb-4 animation-delay-5">
                <center>
                <h3><b><i>Kategori Tidak Ditemukan</i></b></h3>
                </center>
            </div>
          </div>
        @endif
        @if($fasilitas->count() > 0)
        @foreach($fasilitas as $fas)
          <div class="col-lg-4 col-md-6">
            <div class="card card-warning wow zoomInUp mb-4 animation-delay-5">
            <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="{{asset('img/'.$fas->foto)}}" alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                        <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">{{$fas->judul}}</h3>
                          
                        </div>
                      </figcaption>
                    </figure>
                  </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
@endsection