<html>
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 <title>Google Map API V3 with markers</title>
 <style type="text/css">
 body { font: normal 10pt Helvetica, Arial; }
 #map { width: 850px; height: 500px; border: 0px; padding: 0px; }
 </style>
 <script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
 <script type="text/javascript">
 //Sample code written by August Li
 var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 function addMarker(lat, lng, info) {
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 position: pt,
 icon: icon,
 map: map
 });
 var popup = new google.maps.InfoWindow({
 content: info,
 maxWidth: 300
 });
 google.maps.event.addListener(marker, "click", function() {
 if (currentPopup != null) {
 currentPopup.close();
 currentPopup = null;
 }
 popup.open(map, marker);
 currentPopup = popup;
 });
 google.maps.event.addListener(popup, "closeclick", function() {
 map.panTo(center);
 currentPopup = null;
 });
 }
 function initMap() {
 map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(0, 0),

 zoom: 10,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });

 center = bounds.getCenter();
 map.fitBounds(bounds);
 <?php
  $content = json_decode($_GET['datos']);
  //$dato=$_GET['datos'];
  //echo $dato;
 // $diferente=(json_decode($_GET['datos'], true));
  
      while ($content) {
   	
		 $lat=$content['latitude'];
		 $lon=$content['longitude'];

 echo ("addMarker($lat, $lon,'<b>$name</b><br/>$desc');\n");
    } 
echo ("addMarker(43.3238,-1.98511,'<b>$name</b><br/>$desc');\n");

 //**************************hacer boocle con for each en php***********
 //addMarker("43.320101","-1.9834367999999358","andia 5");
 //addMarker("43.3237","-1.9793","kursal");
 //addMarker("43.3169218", "-1.9836272999999665","san martin");
?>
 }
 </script>
 </head>
 <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
 <div id="map"></div>
 </html>