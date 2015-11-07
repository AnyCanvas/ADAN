<?php
	session_start();

	require 'resources/library/functions.php';

	if (isset($_SESSION['config']['type']))	{
		if (checkForDuplucatedLike() || $_SESSION['config']['type'] != 'like'){
			$deviceId = $_SESSION["deviceId"];
			$accesToken = $_SESSION['accesToken'];
	//		if(fanbotAction( $deviceId, $accesToken)){
// Agregado para el sistema de fanbot por medio de internet
			if($_SESSION['id'] == "FB-B1-SCM-00102" ){
				$texto = colorCheck();
				fanbotAction( $deviceId, $accesToken);
				saveUserDataToDB();
				saveInteractionToDB();
				require_once("resources/library/success.php");	
				mg_send($texto);			
// Fin de agregado por medio de internet.
			} else {
				fanbotAction( $deviceId, $accesToken);
				saveUserDataToDB();
	//			if ($_SESSION['fbUserId'] !== '120319224983556'){
				saveInteractionToDB();
	//			}			
				require_once("resources/library/success.php");
	//		} else {
	//			$_SESSION['error'] = 2;
	//			require_once("resources/library/error.php");			
	//		}
			}
		} else {
				$_SESSION['error'] = 1;
				require_once("resources/library/error.php");
			}
	} else {
			$_SESSION['error'] = 1;
			require_once("resources/library/error.php");
		}
		
	session_unset();

?>