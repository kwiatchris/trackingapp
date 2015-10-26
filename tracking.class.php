<?php
session_start();
$id_usuario_sesion=$_SESSION['login_user'];
echo "hello ".$id_usuario_sesion;
require 'tracking.class.Model.php';
require 'tracking.class.Controller.php';
//require 'tracking.class.View.php';
require 'tracking.html';
//require 'tracking.class.Extracting.Map.php';
//require 'tracking.login.html';
extract($_POST);
 $newusu=new Model();
 $newusu->leer();
echo "<br>";echo "<br>";

if(isset($_POST['insertar'])){
   // echo "button pressed";echo "<br>";
    if(empty($usuario)||empty($longitude)||empty($latitude)) {
 		echo "empty";
        echo "<script language='javascript'>";
		echo "alert('falta datos o datos incorectos !!!!')";
		echo "</script>";
		//header('Refresh:1;URL=http://localhost/Aitor/.php');
}else{
    $control=new Controller();
    $control->insertar($newusu);
    echo "la fila insertada";
	//$print=new View();//$print->output_view($newusu);
}
}
if(isset($_POST['recoger'])&&(!empty($datealternate))&&(!empty($recoger_usuario))){
    $recog=new Controller();
     //$recog->recoger($recoger_usuario);//*****************recoger sin fecha
        $recog->recogerconfecha($recoger_usuario,$datealternate);
    //echo $datealternate;
        //echo $alternate;
}elseif(isset($_POST['recoger'])&&(!empty($recoger_usuario))){
$recog=new Controller();
$recog->recoger($recoger_usuario);
}
//*******************dos formas a pasar el parametro con el link con el ID***********
 // $id_track=$_GET['id'];
 //  echo $id_track;
    // function callfunction(){
    //     echo "estamos en callfuncion";
    // }
  //******************segunda forma llamamos a funkcion desde un link******************
  if($_GET['action'] == 'callfunction'){
     $id_track=$_GET['id'];
     $fetcha_track=$_GET['fecha'];
     if(!isset($fetcha_track)){
          $del=new Controller();
          $del->delete($id_track);
}elseif(isset($fetcha_track)&&(isset($id_track))){
          $delconfecha=new Controller();
          $delconfecha->deleteconfecha($id_track,$fetcha_track);
                                                }
                                      }

  if($_GET['action'] == 'mapamostrar'){
    $content = json_decode($_GET['data']);
    $map=new Controller();
    $map->extract();
    print_r($content);
    echo "mapamostrar";
  } 
if(isset($_POST['signup'])){
 if(empty($login)||empty($nombre)||empty($password)||!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script language='javascript'>";
    echo "alert('falta datos o datos incorectos !!!!')";
    echo "</script>";
    }else{
      $passmd5 = md5($password);
      //echo $passmd5;
      $crearusu=new Controller();
      $crearusu->crearusuario($login,$nombre,$passmd5,$email);
      }
    }
 // Starting Session
if (isset($_POST['login'])) {
if (empty('username') || empty('password')) {
$error = "Username or Password is invalid";
}else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$passmd5 = md5($password);
 $trylogin=new Controller();
 $trylogin->login($username,$passmd5);
echo $trylogin;
}
}
//print_r($_SESSION['puntos']);
echo "<a href=tracking.logout.php"."><input type='button' value=' LOGOUT '></a>";
?>
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
 $puntos=$_SESSION['puntos'];
  //$content = json_decode($_GET['datos']);
  //$dato=$_GET['datos'];
  //echo $dato;
 // $diferente=(json_decode($_GET['datos'], true));
  
 //      while ($puntos) {
    
 //     $lat=$puntos['latitude'];
 //     $lon=$puntos['longitude'];

 // echo ("addMarker($lat, $lon,'<b>$name</b><br/>$desc');\n");
 //    } 
    foreach ($_SESSION['puntos'] as $key ) {
      
     $lat=$key['latitude'];
     $lon=$key['longitude'];

 echo ("addMarker($lat, $lon,'<b>$name</b><br/>$desc');\n");
    }


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