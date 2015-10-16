
<?php
require 'vendor/autoload.php';
require 'tracking.class.Model.php';
require 'tracking.class.Controller.php';
require 'tracking.class.View.php';
require 'tracking.html';
extract($_POST);
// $newusu=new Model();
// $newusu->leer();

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
     //echo $fetcha_track;
  //echo $id_track;
     if(!isset($fetcha_track)){
  $del=new Controller();
  $del->delete($id_track);
}elseif(isset($fetcha_track)&&(isset($id_track))){
  $delconfecha=new Controller();
  $delconfecha->deleteconfecha($id_track,$fetcha_track);
}
   }

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->get('/', function () {
   echo "Hello SLIM!";
});
$app->post('/tracking.class.php/', function () use ($app) {
  $username = $app->request->post('usuario'); 
    echo "HTTP post, username: $usuario";
});
$app->post('/', function () use ($app) {
  $usuario = $app->request->post('usuario'); 
  $latitude = $app->request->post('latitude'); 
  $longitude = $app->request->post('longitude'); 
   $recoger_usuario = $app->request->post('recoger_usuario'); 
 $datealternate=$app->request->post('datealternate');
       
       $nuevoslim=new Model();
      $nuevoslim->_usuario=$usuario;
      $nuevoslim->_latitude=$latitude;
      $nuevoslim->_longitude=$longitude;
      if($nuevoslim){ $control=new Controller();
                      $control->insertar($nuevoslim);}
     if(!$datealternate){$recog=new Controller();
                        $recog->recoger($recoger_usuario);}
     if($datealternate){$recogconf=new Controller();
                        $recogconf->recogerconfecha($recoger_usuario,$datealternate);}
});

$app->run();
?>