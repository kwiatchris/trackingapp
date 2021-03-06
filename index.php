<?php
session_start(); //session start
require 'tracking.class.Conexion.php';
require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '421942014243-fpaj8mb427h3nr0rub3innun6bt49g76.apps.googleusercontent.com'; 
$client_secret = 'ExuNPFkqn-n9ZsnXvchUO8pQ';
$redirect_uri = 'http://localhost/Aitor/TRACKING%20APP/trackingapp/index.php';

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}
/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);
/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
 if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}
/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}
//Display user info or display login url as per the info we have.
// Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: tracking.class.php");
}

if (isset($authUrl)){ 
	//show login url button
	?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="main">
	<h1>PHP Login Trackingapp</h1>
	<div id="login">
<h2>Login Form</h2>
	<form action="tracking.class.php" method="post">
		<label>UserName :</label>
		<input id="name" name="username" placeholder="username" type="text">
		<label>Password :</label>
		<input id="password" name="password" placeholder="**********" type="password">
	<br><input name="login" type="submit" value=" Login ">
	</form><br>
	<form action="tracking.crearusuario.html">
		<input type="submit" value="crear usuario">
	</form>
<span><?php echo $error; ?></span>
	</div>
</body>
</html>
<?php 
	echo '<h3>Login with Google </h3>';
	echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
		
} else {
	
	$user = $service->userinfo->get(); //get user info 
		//var_dump( $user);
	// connect to database
	$modelo=new Conexion();
    $pdo=$modelo->conectar();
	//echo $user[id];
	//check if user exist in database using COUNT
	$result = $pdo->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
	$user_count = $result->fetchAll(PDO::FETCH_ASSOC); //will return 0 if user doesn't exist
	
	//var_dump($user_count);
	//echo $user_count[0]['usercount'];
	
	//show user picture	//echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
		if($user_count[0]['usercount']) //if user already exist change greeting text to "Welcome Back"
    {
        echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
         header("Refresh: 2;url=tracking.class.php"); 
    }
	else //else greeting text "Thanks for registering"
	{ 	$modelo=new Conexion();
     	$pdo=$modelo->conectar();

        echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		$statement=$pdo->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
		//$statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
		$statement->bindValue(1,$user->id,PDO::PARAM_INT);
		$statement->bindValue(2,$user->name,PDO::PARAM_STR);
		$statement->bindValue(3,$user->email,PDO::PARAM_STR);
		$statement->bindValue(4,$user->link,PDO::PARAM_STR);
		$statement->bindValue(5,$user->picture,PDO::PARAM_STR);
		//$statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
		$statement->execute();
		 header("Refresh: 2;url=tracking.class.php");
		
    }
	//print user details
	echo '<pre>';
	//print_r($user);
	echo '</pre>';
}
echo '</div>';
?>

