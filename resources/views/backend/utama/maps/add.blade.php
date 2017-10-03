<style>
  #map-canvas{
    width: 350px;
    height: 250px;
  }
</style>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrmOH1T0Znrn7UqKm8mxNU0c4au_SWIFo&amp;libraries=places"></script>

          <div class="container">
            <div class="col-md-4">
            <h1>SMK Assalaam</h1>
              {{ Form::open(array('url'=>'/vendor/add', 'files'=>true)) }}
                <div class="form-group">
                  <label for="">Lokasi</label>
                  <input type="text" name="lokasi" class="form-control input-sm">
                </div>
                 <div class="form-group">
                  <label for="">Maps</label>
                  <input type="text" id="searchmap">
                  <div id="map-canvas"></div>
                </div>
                 <div class="form-group">
                  <label for="">Lat</label>
                  <input type="text" name="lat" class="form-control input-sm" id="lat">
                </div>
                <div class="form-group">
                  <label for="">Lng</label>
                  <input type="text" name="lng" class="form-control input-sm" id="lng">
                </div>
                <button class="btn btn-primary">Simpan</button>
              {{ Form::close() }}
            </div>
          </div>

    <script>
      var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
          lat: 27.72,
          lng: 85.36
        },
        zoom:15
      });

      var marker = new google.maps.Marker({
        position: {
          lat: 27.72,
          lng: 85.36
        },
        map: map,
        draggable: true
      });

      var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

      google.maps.event.addListener(searchBox, 'places_changed', function(){

        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        for(i=0; place=places[i]; i++){
          bounds.extend(place.geometry.location);
          marker.setPosition(place.geometry.location);
        }

        map.fitBounds(bounds);
        map.setZoom(15);

      });

      google.maps.event.addListener(marker,'position_changed', function(){

        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);

      });
      
    </script>
