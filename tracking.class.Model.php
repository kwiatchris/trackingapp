<?php

class Model
{
    public $_usuario;
    public $_latitude;
    public $_longitud;
    
       public function __construct(){
              }
    
    function leer(){
         $this->_usuario=$_POST['usuario'];
         $this->_latitude=$_POST['latitude'];
         $this->_longitud=$_POST['longitud'];
            //loop de usuario con todos puntos guardados
    }
}
?>