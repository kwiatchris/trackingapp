<?php
session_start();
require 'tracking.class.Conexion.php';

class Extracting{
	private $pdo;

	function extract(){
				 $modelo=new Conexion();
                    $pdo=$modelo->conectar();
				if(!$pdo){
                     die('could not connect'.PDO_error());
                        }else{
                        		$datos=$pdo->query("SELECT * FROM `tracking` ");
                        		echo "extract";
                        		$datos->execute();
                        		$result=$datos->fetchAll(PDO::FETCH_ASSOC);
                        		print_r($result);
                        		$mostro=new View();
                                $mostro->mostrar($result);
                        }
                    }    

}
?>