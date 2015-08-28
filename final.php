<?php
	session_start();

	require 'resources/library/functions.php';

	if (checkForDuplucatedLike()){
		$deviceId = $_SESSION["deviceId"];
		$accesToken = $_SESSION['accesToken'];
		if(fanbotAction( $deviceId, $accesToken)){
			saveUserDataToDB();
			if (strpos($_SESSION['fbUserId'], 'tfbnw.net') !== FALSE){
			saveInteractionToDB();
			}			
			require_once("resources/library/success.php");
		} else {
			$_SESSION['error'] = 2;
			require_once("resources/library/error.php");			
		}
	} else {
		$_SESSION['error'] = 1;
		require_once("resources/library/error.php");
	}
