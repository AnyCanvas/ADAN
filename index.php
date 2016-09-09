<?php
	include 'resources/library/functions.php'; 
	session_start();

	if( isset($_GET["name"]) ){
			$_SESSION['fnbt']['name'] = $_GET["name"];
	} else{
		if(isset($_SESSION['fnbt']['name'])){
			unset($_SESSION['fnbt']['name']);
		}
	}
	$_SESSION['page'] = 0;
	$_SESSION['error'] = 'no';

	?>
<!DOCTYPE html>
<html>
<head>
<?php require_once( "resources/html/header.php" ); ?>
	<title>Bienvenido a Fanbot</title>
</head>

<?php require_once( "resources/html/index.php" ); ?>

</html>