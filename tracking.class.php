
<?php
require 'tracking.class.Model.php';
require 'tracking.class.Controller.php';
require 'tracking.class.View.php';
require 'tracking.html';

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
if(isset($_POST['recoger'])&&(!empty($datealternate))&&(!empty($recoger_usuario))){
    $recog=new Controller();
    //echo $recoger_usuario;
    // echo $alternate;
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
  //echo $id_track;
  $del=new Controller();
  $del->delete($id_track);
   }
//print_r($data);
//$string=$newusu;

?>