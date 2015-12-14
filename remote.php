<?php

	require 'resources/library/functions.php';
	session_start();
	$fnbtName = $_GET["name"];

	findFnbt($fnbtName);
	fanbotAction( $_SESSION['deviceId'], $_SESSION['accesToken'] );
		
	session_unset();

?>