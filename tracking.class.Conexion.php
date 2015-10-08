<?php
class Conexion{
    var $host="localhost";
    var $dbname="TEST";
    var $user="root";
    var $pass="internet80";

function __construct(){}

public function conectar(){
    try{
        $conexion=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass,array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
            return ($conexion);
        }catch (PDOExeption $e){
            echo '<script> alert("¡Error!: ' . $e->getMessage() . ')</script>';
            return;
        }
}
}
?>