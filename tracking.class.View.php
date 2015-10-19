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
    {   
        echo '<table border=3; border-radius:10px;font-family:raleway;font-size:16px;>';
        echo '<tr>';
        echo '<td>' . $row['id_tracking'] .'    '.' '. '</td>';
        echo '<td>' . $row['id_usuario'] .'    '.' '. '</td>';
        echo '<td>' . $row['latitude'] . '  '.' '.'</td>';
        echo '<td>' . $row['longitude'] . '  '.'</td>';
        echo '<td>' . $row['fecha'] . '</td>';
                       
               //  echo '<td>'."<a href=http://localhost/Aitor/TRACKING%20APP/trackingapp/tracking.class.php?id=".$row['id_tracking'].'>'."CLICK</a>".'</td>';
         //************************************link con la function, pasa el id y llama la function a href....*************
        // echo '<td>'."<a href=tracking.class.php?action=callfunction&id=".$row['id_tracking'].">Click</a>".'</td>';
         //************************************button con el link llamando la function ***********************
         echo '<td>'."<a href=tracking.class.php?action=callfunction&id=".$row['id_tracking']."><input type='button' value='delete'></a>".'</td>';
         echo '<td>'."<a href=tracking.class.php?action=mapamostrar&datos=".json_encode($obj)."><input type='button' value=' MAP' ></a>".'</td>';
         //<input type="button" value="Put Your Text Here" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        echo '</tr>';echo "<br>";
        echo '</table';
       }
//        The best way to do that is to use json_encode():

// file_get_contents('http://www.example.com/script.php?data='.json_encode($object));
// on the other side:

// $content = json_decode($_GET['data']);
    
    //echo "<a href=tracking.logout.php"."><input type='button' value=' LOGOUT '></a>";
    }
}

// ?>
