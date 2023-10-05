                
@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        @auth
        @include('layouts.header')                
            <div class="container">  
                <div class="row">  
                    <h3>Your "{{$enroute_name->name}}" route view on map:</h3>
        <div id="map" style='height:400px'></div>
            </div>
            </div>

<script type="text/javascript">
    function initializeMap() {
        const locations = <?php echo json_encode($locations) ?>;
        const map = new google.maps.Map(document.getElementById("map"));
        var infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();
        for (var location of locations) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.lat, location.lng),
                map: map
            });
            bounds.extend(marker.position);
            google.maps.event.addListener(marker, 'click', (function(marker, location) {
                return function() {
                    infowindow.setContent(location.source_point+'<br>'+'Route: '+location.name);
                    infowindow.open(map, marker);
                }
            })(marker, location));

        }
        map.fitBounds(bounds);
        var lineCoordinates = locations.map(function (val) {
    return new google.maps.LatLng(val['lat'], val['lng']);
  });
     
     var lineSymbol = {
    path: 'M 0,-2 0,1',
    strokeOpacity: 1,
    scale: 4
   };

   var line = new google.maps.Polyline({
  path: lineCoordinates,
  strokeOpacity: 0,
  icons: [{
    icon: lineSymbol,
    offset: '0',
    repeat: '20px'
  }],
  map: map
});

    }

</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initializeMap"></script>
@endauth
@endsection
