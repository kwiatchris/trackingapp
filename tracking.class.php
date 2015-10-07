
<?php
require 'tracking.class.Model.php';
require 'tracking.class.Controller.php';
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

require 'tracking.html';

extract($_POST);

$newusu=new Model();
$newusu->leer();
echo $recoger_usuario;
$recog=new Controller();
$recog->recoger($recoger_usuario);
print_r($recog);
echo "<br>";
if(isset($_POST['submit'])||empty($usuario)||empty($longitude)||empty($latitude)) {
 		echo "<script language='javascript'>";
		echo "alert('falta datos o datos incorectos !!!!')";
		echo "</script>";
		//header('Refresh:1;URL=http://localhost/Aitor/.php');
}else{
    $control=new Controller();
    $control->insertar($newusu);
	
$print=new View();
$print->output_view($newusu);
}
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