<?php
session_start();
require 'tracking.class.Conexion.php';
require 'tracking.class.View.php';

class Controller{
    private $pdo;
    private $model;
    private $usu;
    private $fecha;
        function recoger($usu){
                      $modelo=new Conexion();
                      $pdo=$modelo->conectar();
                    if(!$pdo){
                          die('could not connect' . PDO_error());
                             }else{
                                echo "estamos en recoger";echo "<br>";
                                //**********************esta select orginal********************
                                 $recoger=$pdo->query("SELECT * FROM `tracking` WHERE `id_usuario`='$usu'");
                                 //(SELECT * FROM `tracking` WHERE DATE(`fecha`) = '$alternate' and `id_usuario`='$usu');
                                 //*****************************************************************
                                 $recoger->execute();
                                $result= $recoger->fetchAll(PDO::FETCH_ASSOC);
                                //print_r($result);
                                $mostro=new View();
                                $mostro->mostrar($result);
                                   }
                  }
    function insertar($model){
                  $timezone = date_default_timezone_get();
                  $date = date('m/d/Y h:i:s a', time());
                  $date = date('Y-m-d H:i:s');
                  //$pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
                  $modelo=new Conexion();
                  $pdo=$modelo->conectar();
                          if(!$pdo){
                              die('could not connect' . PDO_error());
                             }else{
                            $insert=$pdo->query("INSERT INTO `tracking`(`id_usuario`, `latitude`, `longitude`, `fecha`) VALUES ('$model->_usuario','$model->_latitude','$model->_longitude','$date');");
                  //if($insert){echo "echo"};
                                  }
                      }        
    function recogerconfecha($usu,$fecha){
                            $modelo=new Conexion();
                            $pdo=$modelo->conectar();
                           // $pdo=new PDO('mysql:host=localhost;dbname=TEST','root','internet80');
                            if(!$pdo){
                                die('could not connect' . PDO_error());
                                      }else{echo "estamos en recoge fecha"; echo "<br>";
                        //echo "<input type='button' value='delete ALL' "; echo "<br>";
                        echo '<td>'."<a href=tracking.class.php?action=callfunction&id=".$usu."&fecha=".$fecha."><input type='button' value='delete ALL'></a>".'</td>';
                                //*********************esta select con la fecha*******************
                        // idea hay q pasar en el metodo la variable $alternate !!!!!!!!!!!!!!!!!!!!!!111 
                         $recoger=$pdo->query("SELECT * FROM `tracking` WHERE DATE(`fecha`) = '$fecha' and `id_usuario`='$usu'");
                         ///******************************************************************
                        $recoger->execute();
                        $result= $recoger->fetchAll(PDO::FETCH_ASSOC);
                        $mostro=new View();
                        $mostro->mostrar($result);
                                          }
                                        }
    function delete($id){
        $modelo=new Conexion();
        $pdo=$modelo->conectar();
                if(!$pdo){
                     die('could not connect'.PDO_error());
                        }else{
                            $delete=$pdo->query("DELETE FROM `tracking` WHERE `id_tracking`='$id'");
                            $delete->execute();
                            echo "la fila se elimono corectamente";
                              }
                         }
      function deleteconfecha($usu,$fecha){
            echo "estamos en deleteconfecha";echo "<br>";
             echo $usu;echo "<br>";
             echo $fecha;
             $modelo=new Conexion();
              $pdo=$modelo->conectar();
                    if(!$pdo){
                         die('could not connect'.PDO_error());
                        }else{
              $deleteconfecha=$pdo->query("DELETE FROM `tracking` WHERE `id_usuario`='$usu' and `fecha` BETWEEN '$fecha 00:00:00.00' AND '$fecha 23:59:59.999'");
              $deleteconfecha->execute();
              if($deleteconfecha){echo "se borro todo corectamente";
                                  }
                              }
                           }
    function crearusuario($log,$nom,$pass,$ema){
        $modelo=new Conexion();
        $pdo=$modelo->conectar();
            if(!$pdo){
                      die('could not connect'.PDO_error());
                      }else{
            $key = $nom . $ema . date('mY');
            $key = md5($key);
            echo $key;
                $crearusu=$pdo->query("INSERT INTO `TEST`.`users` (`id`, `login`, `nombre`, `password`, `email`, `active`)
            VALUES (NULL, '$log', '$nom', '$pass', '$ema', UNHEX('0'));"); 
            echo "<br>";
                $userid= $pdo->lastInsertId();
                $confirm = $pdo->query("INSERT INTO `confirm` VALUES(NULL,'$userid','$key','$ema')");
                          }
            if($crearusu&&$confirm){header("location: tracking.login.html");}
                                                }
    function login($log,$pass){
          $modelo=new Conexion();
          $pdo=$modelo->conectar();
           if(!$pdo){
                      die('could not connect'.PDO_error());
                      }else{
                        
                        $searchusu=$pdo->query("select * from users where password='$pass' AND login='$log'");
                        $searchusu->execute();
                        $result=$searchusu->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                      $_SESSION['login_user']=$log;
                           // Initializing Session
                               header("location: tracking.class.php"); // Redirecting To Other Page
                               } else {header("location: tracking.login.html"); echo "false";
                              // $error = "Username or Password is invalid";
                               }
                      }
                    }
                    function extract(){
                    $modelo=new Conexion();
                    $pdo=$modelo->conectar();
        if(!$pdo){
                     die('could not connect'.PDO_error());
                        }else{header("location: map.html");
                        
                            //$datos=$pdo->query("SELECT * FROM `tracking` ");
                            //$datos->execute();
                            //$result=$datos->fetchAll(PDO::FETCH_ASSOC);
                            //print_r($result);
                              foreach ($result as $rw) {
                            echo $rw['id_tracking'];
                            echo $rw['latitude'];
                            echo $rw['longitude'];
                            echo "<br>";
                         }
                         //  echo ("addMarker($lat, $lon,'<b>$usu</b><br/>$fecha');\n");
    //                           }
                        
                            }addMarker("43.3169218", "-1.9836272999999665","san martin");
                                 } 

                }

 ?>