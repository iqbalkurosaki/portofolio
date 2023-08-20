
<!DOCTYPE html>
<html>
 <head>
 <style>
 #map-canvas {
 width: 1050px;
 height: 500px;
 }

 </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuMcdPJZ6BNd_Dmjo98MOsOHJ7tALv8qM"></script>
 <script>
 var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var icons = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/red.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var iconhaver = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/orange.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var marker;
 function initialize() {
 var mapCanvas = document.getElementById('map-canvas');
 var mapOptions = {
 mapTypeId: google.maps.MapTypeId.ROADMAP
 }
 var map = new google.maps.Map(mapCanvas, mapOptions);
 var infoWindow = new google.maps.InfoWindow;
 var bounds = new google.maps.LatLngBounds();
 function bindInfoWindow(marker, map, infoWindow, html) {
 google.maps.event.addListener(marker, 'click', function() {
 infoWindow.setContent(html);
 infoWindow.open(map, marker);
 });
 }
 function addMarker(lat, lng, info) {
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 map: map,
 icon:icon,
 position: pt
 });
 map.fitBounds(bounds);
 bindInfoWindow(marker, map, infoWindow, info);
 }
 function addMarkers(lat, lng, info) {
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 map: map,
 icon:icons,
 position: pt
 });
 map.fitBounds(bounds);
 bindInfoWindow(marker, map, infoWindow, info);
 }
 function addMarkerhaver(lat, lng, info) {
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 map: map,
 icon:iconhaver,
 position: pt
 });
 map.fitBounds(bounds);
 bindInfoWindow(marker, map, infoWindow, info);
 }
 <?php
 

 include('../config/config.php');
 		session_start();

		$user=$_SESSION['FULLNAME'];

		
	$sql_haver_user = "SELECT * FROM map where user_nm = '".$user."'";
	$res_haver_user=$db->execute($sql_haver_user);
	
	$sql_havers = "SELECT * FROM map";
	$res_haver=$db->execute($sql_havers);
	$no = 0;
        while (!$res_haver->EOF) {
				//orang lain
			$lat_haver = $res_haver->fields["lat"];
			$lon_haver = $res_haver->fields["lon"];
			
			// dirinya sendiri
			$lats_haver = $res_haver_user->fields["lat"];
			$lons_haver = $res_haver_user->fields["lon"];
			
			
			$haver = getDistance($lats_haver, $lons_haver, $lat_haver, $lon_haver);
			$jarak[$no] = $haver;
			/*$found[$no]=array(
				"user_id"=>$res_haver->fields["user_nm"],
				"latitude"=>$res_haver->fields["lat"],
				"longitude"=>$res_haver->fields["lon"],
				"jarak"=>$haver
			);*/
			
			// cek dirinya sendiri
			if( $user == $res_haver->fields["user_nm"] ){
				echo ("addMarkers(".$res_haver->fields["lat"].", ". $res_haver->fields["lon"].",'<b>".$res_haver->fields["user_nm"]."</b><br/>jarak: ". $haver." km');\n");
					}else{
				
				if( $haver > 1 )
					echo ("addMarker(".$res_haver->fields["lat"].", ". $res_haver->fields["lon"].",'<b>".$res_haver->fields["user_nm"]."</b><br/>jarak: ". $haver." km');\n");
				else
					echo ("addMarkerhaver (".$res_haver->fields["lat"].", ". $res_haver->fields["lon"].",'<b>".$res_haver->fields["user_nm"]. "</b><br/>jarak: ".$haver." km');\n");
			}
			
			$no++;
			
			$res_haver->MoveNext();
        }
		
 ?>
 }
 google.maps.event.addDomListener(window, 'load', initialize);
 </script>
 </head>
 
 <body>
 <div id="map-canvas"></div>
 </body>
</html>