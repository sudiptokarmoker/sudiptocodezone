<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google map API</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkfsC3rssOinQcnoreUf8OLkhQ54MF6No&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width: 100%;
        height: 600px;
        float: left;
      }
      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .header{height: 100px; float: left;}
    </style>
     <script>
         (function(exports){
            "use strict";
            function initMap(){
                // New map init here
                var map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: -34.397,
                        lng: 150.644
                    },
                    zoom: 8
                });

                // listner for get click event
                google.maps.event.addListener(map, 'click', function(event){
                    addMarker({coords:event.latLng});
                });

                function addMarker(props){
                    var marker = new google.maps.Marker({
                        position:props.coords,
                        map:map
                    });

                     // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

                    // Check content
                    if(props.content){
                    var infoWindow = new google.maps.InfoWindow({
                        content:props.content
                    });

                    marker.addListener('click', function(){
                        infoWindow.open(map, marker);
                    });
                    }
                }

                // Array of markers
            var markers = [
                    {
                    coords:{lat:42.4668,lng:-70.9495},
                    iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                    content:'<h1>Lynn MA</h1>'
                    },
                    {
                    coords:{lat:42.8584,lng:-70.9300},
                    content:'<h1>Amesbury MA</h1>'
                    },
                    {
                    coords:{lat:42.7762,lng:-71.0773}
                    }
                ];

                // Loop through markers
                for(var i = 0;i < markers.length;i++){
                    // Add marker
                    addMarker(markers[i]);
                }

            }
            exports.initMap = initMap;
        })((this.window = this.window || {}));
    </script>
</head>
<body>
    <div class="header">
        <h1>Google MAP Api</h1>
    </div>
    <div id="map"></div>
</body>
</html>