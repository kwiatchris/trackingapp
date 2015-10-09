<?php
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
    public function mostrar($obj){
         foreach ($obj as $row) 
    {   echo '<table border=3>';
        echo '<tr>';
        echo '<td>' . $row['id_tracking'] .'    '.' '. '</td>';
        echo '<td>' . $row['id_usuario'] .'    '.' '. '</td>';
        echo '<td>' . $row['latitude'] . '  '.' '.'</td>';
        echo '<td>' . $row['longitude'] . '  '.'</td>';
         echo '<td>' . $row['fecha'] . '</td>';
        echo '</tr>';echo "<br>";
        echo '</table';
        
    }
    }
}
?>