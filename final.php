<?php
	session_start();

	require 'resources/library/functions.php';

	
	if (checkForDuplucatedLike() || $_SESSION['config']['type'] != 'like'){
		$deviceId = $_SESSION["deviceId"];
		$accesToken = $_SESSION['accesToken'];
//		if(fanbotAction( $deviceId, $accesToken)){
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
	} else {
		$_SESSION['error'] = 1;
		require_once("resources/library/error.php");
	}
