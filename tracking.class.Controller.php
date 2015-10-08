<?php
require 'tracking.class.Conexion.php';
class Controller{
    private $pdo;
	private $model;
    private $usu;
	
    function recoger($usu){
        $modelo=new Conexion();
$pdo=$modelo->conectar();
       // $pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
        if(!$pdo){
            die('could not connect' . PDO_error());
           
}else{
    echo "estamos en recoger";echo "<br>";
   
     $recoger=$pdo->query("SELECT * FROM `tracking` WHERE `id_usuario`='$usu'");
     $recoger->execute();
    $result= $recoger->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
}
    }
    function insertar($model){
        
$timezone = date_default_timezone_get();
//echo "The current server timezone is: " . $timezone;
$date = date('m/d/Y h:i:s a', time());
echo $timezone;
$date = date('Y-m-d H:i:s');

echo $date;echo "<br>";
//$pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
$modelo=new Conexion();
$pdo=$modelo->conectar();
        if(!$pdo){
	        die('could not connect' . PDO_error());
	       
}else{
    echo "estamos en insert";echo "<br>";
    echo $model->_usuario;echo "<br>";
     $insert=$pdo->query("INSERT INTO `tracking`(`id_usuario`, `latitude`, `longitude`, `fecha`) VALUES ('$model->_usuario','$model->_latitude','$model->_longitude','$date');");
//if($insert){echo "echo"};
}
    }        
    function mostrar(){
            //quien hace y que
    }
}

?> 