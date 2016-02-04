<?php
	session_start();
	$_SESSION['page'] = 0;
	include 'resources/library/functions.php'; 

	if( isset($_GET["name"]) ){
		if ($_GET["name"] = 'centi'){
			
		}
	}
	?>
<!DOCTYPE html>
<html>
<head>
<?php require_once( "resources/html/header.php" ); ?>
	<title>Bienvenido a Fanbot</title>
</head>

<?php require_once( "resources/html/index.php" ); ?>

</html>