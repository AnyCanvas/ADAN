<?php
	session_start();
	$_SESSION['page'] = 1;
	include 'resources/library/functions.php'; 
    $loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&scope=public_profile,email&response_type=code';	

	?>
<!DOCTYPE html>
<html>
<head>
<?php require_once( "resources/html/header.php" ); ?>
	<title>Bienvenido a Fanbot</title>
</head>

<?php require_once( "resources/html/index.php" ); ?>

</html>