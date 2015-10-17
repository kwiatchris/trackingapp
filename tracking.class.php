
<?php
session_start();
$id_usuario_sesion=$_SESSION['login_user'];
echo "hello ".$id_usuario_sesion;
require 'tracking.class.Model.php';
require 'tracking.class.Controller.php';
require 'tracking.class.View.php';
require 'tracking.html';
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
echo "<a href=tracking.logout.php"."><input type='button' value=' LOGOUT '></a>";


?>