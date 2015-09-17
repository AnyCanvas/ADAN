<?php
	session_start();
	$_SESSION['pageNumber'] = 1;
	include 'resources/library/functions.php';

	$fnbtName  = "agi";
	
	if(findFnbt($fnbtName)){
		$token = $_SESSION['accesToken'];
		$id = $_SESSION['deviceId'];
		echo ' ' + $token + ' ';
		echo $id;
		fanbotAction($id, $token);
	} else {
		echo 'No se encontro la fanbot';
	}
	
	
?>