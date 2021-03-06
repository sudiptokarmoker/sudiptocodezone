<?php 
    if(isset($_REQUEST['latlng'])){
        $bin = base64_decode($_REQUEST['latlng']);
        $decode = json_decode($bin);
        $lat = $decode->lat;
        $lng = $decode->lng;
        //echo "LAT : ".$decode->lat;
        //echo "LNG : ".$decode->lng;
    } else{
        $lat = 27.72;
        $lng = 85.36;        
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>MAP Serach API</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0&libraries=places&v=weekly"
defer
></script>
    <style>
    #map-canvas{
        width: 50%;
        height: 400px;
        margin: 20px auto 20px auto;
    }
</style>
<script type="text/javascript">
    window.onload = function(){

        
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: <?php echo $lat; ?>,
                lng: <?php echo $lng; ?>
            },
            /*
            center: {
                lat: 26.1033921,
                lng: 91.50614209999999
            },
            */
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {
                lat: <?php echo $lat; ?>,
                lng: <?php echo $lng; ?>
            },
            /*position: {
                lat: 26.1033921,
                lng: 91.50614209999999
            },*/
            map: map,
            draggble: true
        });

        // init search place text box here
        document.getElementById("mapsearch").value = "<?php echo base64_decode($_REQUEST['address'])?>";

        var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));
        

        //var autocomplete = new google.maps.places.Autocomplete(searchBox);

        // place search chage event here //
        google.maps.event.addListener(searchBox, 'places_changed', function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();

            var i, place;

            for(i = 0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }

            map.fitBounds(bounds);
            map.setZoom(15);
        });

        var btnPostPage1 = document.getElementById("btnPostPage1");

        btnPostPage1.onclick = function(){
            
                window.location.href = "http://localhost/google_map_api/index5.php";
        
        };
    }
</script>
  </head>
  <body>
  <input type="text" id="mapsearch" size="50"/>
<div id="map-canvas"></div>
<div>
    <button 
        id="btnPostPage1"
    >
    Back to page 1
</button>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>