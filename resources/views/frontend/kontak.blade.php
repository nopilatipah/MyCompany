@extends('layouts.user')


@section('content')
<style>
  #map-canvas{
    width: 1300px;
    height: 450px;
  }
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrmOH1T0Znrn7UqKm8mxNU0c4au_SWIFo&amp;libraries=places"></script>


<center>
  <div id="map-canvas"></div>
</center>

<section id="contact" class="mt-6">
          <div class="wrap ms-hero-bg-info ms-hero-img-keyboard ms-bg-fixed">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card card-primary animated zoomInUp animation-delay-5">
                    <div class="card-block">
                      <form class="form-horizontal" method="post" action="{{route('pesan.store')}}">
                        {{ csrf_field() }}
                        <fieldset class="container">
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <input type="text" name="nama_depan" class="form-control" id="inputName" placeholder="Nama Depan"> </div>
                              <div class="col-lg-6">
                              <input type="text" name="nama_belakang" class="form-control" id="inputName" placeholder="Nama Belakang"> </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Alamat Email"> </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <input type="text" name="subjek" class="form-control" id="inputSubject" placeholder="Subjek"> </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <textarea class="form-control" name="pesan" rows="3" id="textArea" placeholder="Pesan Anda..."></textarea>
                            </div>
                          </div>
                          <div class="form-group row justify-content-end">
                            <div class="col-lg-2">
                              <button type="submit" class="btn btn-raised btn-primary">Kirim Pesan</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- container -->
          </div>
        </section>

<script>

      var lat = {{ $vendor->lat }};
      var lng = {{ $vendor->lng }};

      var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
          lat: lat,
          lng: lng
        },
        zoom:17
      });

      var marker = new google.maps.Marker({
        position: {
          lat: lat,
          lng: lng
        },
        map: map
      });
      
    </script>

@endsection