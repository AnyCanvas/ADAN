<?php
	session_start();
	$_SESSION['pageNumber'] = 1;
	include 'resources/library/functions.php';

	$fnbtName  = htmlspecialchars($_GET["name"]);
	
	if(findFnbt($fnbtName)){
		$token = $_SESSION['accesToken'];
		$id = $_SESSION['deviceId'];
		echo ' ' + $token + ' ';
		echo $id;
		fanbotAction($id, $token);
	} else {
		echo 'No se encontro la fanbot';
	}
	
	header("location: ./god.php?name=". $fnbtName);
	
?>