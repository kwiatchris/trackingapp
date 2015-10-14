<?php
require 'tracking.class.Conexion.php';

class Controller{
    private $pdo;
    private $model;
    private $usu;
    private $fecha;
    
    function recoger($usu){
        $modelo=new Conexion();
        $pdo=$modelo->conectar();
       // $pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
        if(!$pdo){
            die('could not connect' . PDO_error());
           
}else{
    echo "estamos en recoger";echo "<br>";
    //**********************esta select orginal********************
     $recoger=$pdo->query("SELECT * FROM `tracking` WHERE `id_usuario`='$usu'");
  
     //(SELECT * FROM `tracking` WHERE DATE(`fecha`) = '$alternate' and `id_usuario`='$usu');
     //*****************************************************************
     $recoger->execute();
    $result= $recoger->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    $mostro=new View();
    $mostro->mostrar($result);
    
}
    }
    function insertar($model){
        
$timezone = date_default_timezone_get();
//echo "The current server timezone is: " . $timezone;
$date = date('m/d/Y h:i:s a', time());
//echo $timezone;
$date = date('Y-m-d H:i:s');

//$pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
$modelo=new Conexion();
$pdo=$modelo->conectar();
        if(!$pdo){
            die('could not connect' . PDO_error());
           }else{
    //echo "estamos en insert";echo "<br>";
   // echo $model->_usuario;echo "<br>";
     $insert=$pdo->query("INSERT INTO `tracking`(`id_usuario`, `latitude`, `longitude`, `fecha`) VALUES ('$model->_usuario','$model->_latitude','$model->_longitude','$date');");
//if($insert){echo "echo"};
}
    }        
    function recogerconfecha($usu,$fecha){
        $modelo=new Conexion();
        $pdo=$modelo->conectar();
       // $pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
        if(!$pdo){
            die('could not connect' . PDO_error());
}else{echo "estamos en recoge fecha"; echo "<br>";

    //echo "<input type='button' value='delete ALL' "; echo "<br>";
    echo '<td>'."<a href=tracking.class.php?action=callfunction&id=".$usu."&fecha=".$fecha."><input type='button' value='delete ALL'></a>".'</td>';

            //*********************esta select con la fecha*******************
    // idea hay q pasar en el metodo la variable $alternate !!!!!!!!!!!!!!!!!!!!!!111 
     $recoger=$pdo->query("SELECT * FROM `tracking` WHERE DATE(`fecha`) = '$fecha' and `id_usuario`='$usu'");
     ///******************************************************************
    $recoger->execute();
    $result= $recoger->fetchAll(PDO::FETCH_ASSOC);
    $mostro=new View();
    $mostro->mostrar($result);
}
    }
    function delete($id){
        $modelo=new Conexion();
        $pdo=$modelo->conectar();
        if(!$pdo){
            die('could not connect'.PDO_error());
        }else{
            $delete=$pdo->query("DELETE FROM `tracking` WHERE `id_tracking`='$id'");
            $delete->execute();
            echo "la fila se elimono corectamente";
        }
    }
    //*****************************buggy/////////////////////
    function deleteconfecha($usu,$fecha){
   echo "estamos en deleteconfecha";echo "<br>";
   echo $usu;echo "<br>";
   echo $fecha;
   $modelo=new Conexion();
    $pdo=$modelo->conectar();
    if(!$pdo){
     die('could not connect'.PDO_error());
    }else{
    $deleteconfecha=$pdo->query("DELETE FROM `tracking` WHERE `id_usuario`='$usu' and `fecha` BETWEEN '$fecha 00:00:00.00' AND '$fecha 23:59:59.999'
");
    $deleteconfecha->execute();
    if($deleteconfecha){
    echo "se borro todo corectamente";
    }
    }
    }
  }
 ?>