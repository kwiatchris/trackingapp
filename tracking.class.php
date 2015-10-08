
<?php
require 'tracking.class.Model.php';
require 'tracking.class.Controller.php';
require 'tracking.calendar.html';
require 'tracking.html';
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

        //print_r($model);

        foreach ($model as $res){//recoremos el resultado por filas adecuados[''] desde query $statement
        echo'<tr>';
        echo'<td>' ."usuario". $res['id_usuario']."</td>";echo "<br>"; 
        echo'<td>' . "latitude". $res['latitude']."</td>";echo "<br>";
        //echo'<td>' ."usuario: ". $res['id_usuario']."</td>";echo "<br>";
                
       // echo'<td>' . "la lista creada dia ". $res['fecha_creacion'].'</td>';echo "<br>";
        echo'<tr>';
        echo "<br>";echo "<br>";
    }
    }

    public function output_map(){
        //hacer view en la mapa de google
        return "<p>" . $this->model->string . "</p>";
    }
}
extract($_POST);
echo $alternate;
echo $submit;
$newusu=new Model();
$newusu->leer();
//echo $recoger_usuario;

//print_r($recog);
echo "<br>";
//echo $submitbutton;
echo $go;echo "<br>";

//echo $submitbutton;
if(isset($_POST['insertar'])){
   // echo "button pressed";echo "<br>";
    if(empty($usuario)||empty($longitude)||empty($latitude)) {
 		echo "empty";
        echo "<script language='javascript'>";
		echo "alert('falta datos o datos incorectos !!!!')";
		echo "</script>";
		//header('Refresh:1;URL=http://localhost/Aitor/.php');
}else{
    //echo "insertamos";
    $control=new Controller();
    $control->insertar($newusu);
    echo "la fila insertada";
	//$print=new View();//$print->output_view($newusu);
}
}
if(isset($_POST['recoger'])){
    $recog=new Controller();
    $recog->recoger($recoger_usuario);


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