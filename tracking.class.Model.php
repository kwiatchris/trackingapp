<?php

class Model
{
    public $_usuario;
    public $_latitude;
    public $_longitude;
    
       public function __construct(){
              }
    
    function leer(){
         $this->_usuario=$_POST['usuario'];
         $this->_latitude=$_POST['latitude'];
         $this->_longitude=$_POST['longitude'];
            //loop de usuario con todos puntos guardados
    }
}
?>