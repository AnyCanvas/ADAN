<?php
	session_start();
	require 'resources/library/functions.php';

?>
<!DOCTYPE html>
<html>
<?php require_once( "resources/html/header.php" ); ?>

<?php

	if (isset($_SESSION['fnbt']['config']))	{
		if ( $_SESSION['error'] != "name" ){
			require_once("resources/library/success.php");
			$deviceId = $_SESSION['fnbt']["deviceId"];
			$accesToken = $_SESSION['fnbt']['accesToken'];
			fanbotAction( $deviceId, $accesToken);
			saveUserDataToDB();
			saveInteractionToDB();
		} else {
				require_once("resources/html/error1.php");
			}
	} else {
			$_SESSION['error'] = 1;
			require_once("resources/html/error2.php");
		}
		
	session_unset();

?>