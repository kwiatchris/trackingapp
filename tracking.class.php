
<?php
require 'tracking.class.Model.php';
class View
{
    private $model;
    private $controller;
    // public function __construct($controller,$model) {
    //     $this->controller = $controller;
    //     $this->model = $model;
    // }
	
    public function output_view($model){
        //hacer view en la pantalla
        echo "estamos en View";
        print_r($model);
    }

    public function output_map(){
        //hacer view en la mapa de google
        return "<p>" . $this->model->string . "</p>";
    }
}
class Controller{
    
	private $model;
	
    function recoger(){
           // print_r($nuevo);
            //quien hace y que
    }
    function insertar(){
        $pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
$timezone = date_default_timezone_get();
//echo "The current server timezone is: " . $timezone;
$date = date('m/d/Y h:i:s a', time());
        if(!$pdo){
	        die('could not connect' . PDO_error());
	       
}else{
     $insert=$pdo->query("INSERT INTO `tracking`(`id_usuario`, `latitude`, `longitud`, `fecha`) VALUES ('$this->_usuario','$this->_latitude','$this->_longitud','$date')");

}
    }        
    function mostrar(){
            //quien hace y que
    }
}
require 'tracking.html';
extract($_POST);

$newusu=new Model();
$newusu->leer();
echo $newusu->_usuario;
echo "<br>";

if(empty($usuario)||empty($longitud)||empty($latitude)) {
 		echo "<script language='javascript'>";
		echo "alert('falta datos o datos incorectos !!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_login.php');
}else{}
    $control=new Controller();
    $control->insertar();
	
$print=new View();
$print->output_view($newusu);
$print->output_view($data);

//print_r($data);
//$string=$newusu;

//$datos=array();
//$newusu->insertar($newusu);
//print_r($array);
//print_r($model);
//$controller->recoger($model);
//$controller->guardar($model);
//$view = new View($controller, $model);
//echo $view->output();
?>