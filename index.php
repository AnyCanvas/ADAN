<?php
	session_start();
	include 'resources/library/functions.php'; 

	if( isset($_GET["name"]) ){
			$_SESSION['fnbt']['name'] = $_GET["name"];
	} else{
		if(isset($_SESSION['fnbt']['name'])){
			unset($_SESSION['fnbt']['name']);
		}
	}
	$_SESSION['page'] = 0;
	$_SESSION['error'] = 'no';
    $loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&scope=public_profile,user_friends,email&response_type=code';	

	?>
<!DOCTYPE html>
<html>
<head>
<?php require_once( "resources/html/header.php" ); ?>
	<title>Bienvenido a Fanbot</title>
</head>

<?php require_once( "resources/html/index.php" ); ?>

</html>