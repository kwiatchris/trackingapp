<?php
session_start();
 include 'class.phpmailer.php';
include 'class.smtp.php';
//require 'tracking.class.Conexion.php';

class Confirmation{
	 var $nombre;
     var $correo;
     var $mail;
     var $key;
public function __construct(){
            
        }
	function email_confirm($nombre,$key,$correo){
        //$link='"localhost/Aitor/TRACKING%20APP/trackingapp/confirmar.php?email="'.$correo."&key="."$key"';
        	 $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            //$mail->SMTPSecure = "ssl";
            $mail->Host = "smtp-mail.outlook.com";
            $mail->Port = 587;
            $mail->Username = "kwiatchris@outlook.com";
            $mail->Password = "internet80";
            $mail->From = "kwiatchris@outlook.com";
            $mail->FromName = "Tracking App";
            $mail->Subject = "Bienvenido a App Tracking";
            $mail->AltBody = "Mensaje de prueba";
            $mail->msgHTML("<h1>Mensaje de Bienvenida</h1><br/><br/><p>
                Hola <b>".$nombre."</b><br>Gracias por incribirse en la <b>Tracking App</b></p><br/>
                <p>Debes activar tu cuenta pulsando este enlace 
                :<a href='http://localhost/Aitor/TRACKING%20APP/trackingapp/confirmar.php?email=".$correo."&key=".$key."'>pulsa aqui para activar la cuenta</a></p>");
                         //<a href="http://www.w3schools.com">Visit W3Schools</a>
                        // echo '<td>'."<a href=map.php?action=mapamostrar&datos=".$obj."><input type='button' value=' MAP' ></a>".'</td>';
                    //echo "<a href='".$link_address."'>Link</a>";
            $mail->addAddress($correo,$nombre);
            $mail->isHTML(true);
            if (!$mail->send()) {
                echo "Error: ".$mail->ErrorInfo;
            }
                    }    

}
//     include 'class.phpmailer.php';
//     include 'class.smtp.php';
//     class userCorreo{
//         var $nombre;
//         var $correo;
//         var $mail;
//         public function __construct(){
            
//         }
//         public function enviarCorreoBienvenida($nombre,$correo){
//             $mail = new PHPMailer();
//             $mail->isSMTP();
//             $mail->SMTPAuth = true;
//             //$mail->SMTPSecure = "ssl";
//             $mail->Host = "smtp.live.com";
//             $mail->Port = 587;
//             //$mail->Username = "natiexperiencia@hotmail.com";
//             //$mail->Password = "nati666000";
//             $mail->From = "natiexperiencia@hotmail.com";
//             $mail->FromName = "Nati";
//             $mail->Subject = "Bienvenido a App Tracking";
//             $mail->AltBody = "Mensaje de prueba";
//             $mail->msgHTML("<h1>Mensaje de Bienvenida</h1><br/><br/><p>Gracias por incribirse en la app <b>App Tracking</b></p><br/>
//                 <p>Su nombre de usuario: ".$nombre."</p>Su correo: ".$correo);
//             $mail->addAddress($correo,$nombre);
//             $mail->isHTML(true);
//             if (!$mail->send()) {
//                 echo "Error: ".$mail->ErrorInfo;
//             }
//         }
//         public function enviarCorreoPosiciones($nombre,$correo){
//             include 'conexion.php';
//             $stmt = $pdo->prepare("SELECT id_usuario from usuarios where nombre = '$nombre' and correo = '$correo'");
//             $stmt->execute();
//             $user = $stmt->fetch(PDO::FETCH_ASSOC);
//             $cont = "SELECT id_usuario,longitud,latitud,tiempo FROM posiciones where id_usuario= ".$user['id_usuario'];
//             $stmt2 = $pdo->prepare($cont);
//             $stmt2->execute();
//             $correoAenviar = "<table border='1'><tr><th>ID_Usuario</th><th>Longitud</th><th>Latitud</th><th>Tiempo</th></tr>";
//             foreach($stmt2->fetchAll(PDO::FETCH_ASSOC) as $row){
//                 $correoAenviar.= "<tr><td>".$row['id_usuario']."</td><td>".$row['longitud']."</td><td>".$row['latitud']."</td><td>".$row['tiempo']."</td></tr>";
//             }
//             $correoAenviar.="</table>";
//             $mail = new PHPMailer();
//             $mail->isSMTP();
//             $mail->SMTPAuth = true;
//             //$mail->SMTPSecure = "ssl";
//             $mail->Host = "smtp.live.com";
//             $mail->Port = 587;
//             $mail->Username = "natiexperiencia@hotmail.com";
//             $mail->Password = "nati666000";
//             $mail->From = "natiexperiencia@hotmail.com";
//             $mail->FromName = "Nati";
//             $mail->Subject = "Posiciones App Tracking";
//             $mail->AltBody = "Mensaje de prueba";
//             $mail->msgHTML($correoAenviar);
//             $mail->addAddress($correo,$nombre);
//             $mail->isHTML(true);
//             if (!$mail->send()) {
//                 echo "Error: ".$mail->ErrorInfo;
//             }
//         }
//     }
// 
