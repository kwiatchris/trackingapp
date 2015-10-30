<?php
require 'tracking.class.Conexion.php';
//setup some variables
$action = array();
$action['result'] = null;
 
//quick/simple validation
if(empty($_GET['email']) || empty($_GET['key'])){
    $action['result'] = 'error';
    $action['text'] = 'We are missing variables. Please double check your email.';          
}

if($action['result'] != 'error'){
 
    //cleanup the variables
    $email = $_GET['email'];
    $key = $_GET['key'];
    //echo $email;
    //echo $key;
       $modelo=new Conexion();
      $pdo=$modelo->conectar();
    //check if the key is in the database
      $recoger=$pdo->query("SELECT * FROM `confirm` WHERE `email` = '$email' AND `key` = '$key' LIMIT 1");
      $recoger->execute();
      $result= $recoger->fetchAll(PDO::FETCH_ASSOC);
    //$check_key = mysql_query("SELECT * FROM `confirm` WHERE `email` = '$email' AND `key` = '$key' LIMIT 1") or die(mysql_error());
     //print_r($result);
    if($result){
                 echo "<br>";
                 $resultuserid= $result[0][userid];
        //get the confirm info
        //$confirm_info = mysql_fetch_assoc($check_key);
       //confirm the email and update the users database
        $update_users=$pdo->query("UPDATE `users` SET `active` = 1 WHERE `id` = '$resultuserid' LIMIT 1");
        $update_users->execute();
        //delete the confirm row
        //$delete = mysql_query("DELETE FROM `confirm` WHERE `id` = '$confirm_info[id]' LIMIT 1") or die(mysql_error());
         
        if($update_users){
                         echo "<h1>La cuenta activa da corectamente<h1>";
            
        }else{echo "<h1>Errror 1829203<h1>"}
     
    }
 
}

?>