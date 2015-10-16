<?php
require 'vendor/autoload.php';
class Model
{
    public $_usuario;
    public $_latitude;
    public $_longitude;
    
       public function __construct(){
              }
    
    function leer(){
        \Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
       $app->post('/', function () use ($app) {
  $usuario = $app->request->post('usuario'); 
  $latitude = $app->request->post('latitude'); 
  $longitude = $app->request->post('longitude'); 
    echo " SLIM username: $usuario";
     echo " SLIM username: $latitude";
     echo " SLIM username: $longitude";
     
      // $nuevoslim->_usuario=$usuario;
      // $nuevoslim->_latitude=$latitude;
      // $nuevoslim->_longitude=$longitude;
      
});
            //loop de usuario con todos puntos guardados
    }
}
?>