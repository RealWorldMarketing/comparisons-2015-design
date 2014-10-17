<?

require("config-barthel.php");

//-----------------------------------------------------------
/* Yo, this here is the connection to grab all things related to the DEALER */
$all_dealers=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
// Check connection
if (mysqli_connect_errno()) {
  // something's fucked up, check your password & username! //
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$dealer_list = mysqli_query($all_dealers,"SELECT * FROM honda_dealer_locations where aid=".$_REQUEST['aid']);

$rowcount = mysqli_num_rows($dealer_list);

while($row = mysqli_fetch_array($dealer_list)) { //grab all dealers in this AID

$i++;
$dealer_name=$row['dealer_name'];
$address=$row['address'];
$city=$row['row'];
$state=$row['state'];
$city=$row['city'];
$zip=$row['zip'];
$phone=$row['phone'];
$website=$row['website'];
$lat=$row['lat'];
$lon=$row['lon'];

if ($i < $rowcount) {
	$map_locations.= "[\"<h4>".$dealer_name."</h4><p>".$address."<br>".$city.", ".$state." ".$zip."<br><a href='tel:".$phone."'>".$phone."</a><br><a href='".$website."' target='_blank'>Website</a></p>\"".",".$lat.",".$lon."],\r\n";
		} else {
    //if it's the last one, we can't print the last comma in the array or Gmaps will have a fit.
	$map_locations.= "[\"<h4>".$dealer_name."</h4><p>".$address."<br>".$city.", ".$state." ".$zip."<br><a href='tel:".$phone."'>".$phone."</a><br><a href='".$website."' target='_blank'>Website</a></p>\"".",".$lat.",".$lon."]\r\n";
	}

}

mysqli_close($all_dealers);

?>
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
  <style>
  p {margin:0px;padding:0px}
  h4 {margin:0px;padding:0px}
  html, body, #map {
  height: 100%;
  margin: 0px;
  padding: 0px
  }
  </style>
</head> 
<body>
  <div id="map"></div>

  <script type="text/javascript">
    // Define your locations: HTML content for the info window, latitude, longitude
    var locations = [
     <?=$map_locations?>
    ];	
	
    // Setup the different icons and shadows
    var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
    
    var icons = [
      'images/maps-honda-logo-alt.png'
    ]
    var icons_length = icons.length;
    
    
    var shadow = {
      anchor: new google.maps.Point(15,33),
      url: iconURLPrefix + 'msmarker.shadow.png'
    };

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(33.8992049, -84.30160209999997),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 750
    });

    var marker;
    var markers = new Array();
    
    var iconCounter = 0;
    
    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon : icons[iconCounter],
        shadow: shadow
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
      iconCounter++;
      // We only have a limited number of possible icon colors, so we may have to restart the counter
      if(iconCounter >= icons_length){
      	iconCounter = 0;
      }
    }

    function AutoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      $.each(markers, function (index, marker) {
        bounds.extend(marker.position);
      });
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    AutoCenter();
  </script> 
</body>
</html>