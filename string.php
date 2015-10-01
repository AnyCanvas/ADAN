<?php
// echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($browser,'Android') !== FALSE){
	echo "\nAndroid\n";
	if (strpos($browser,'Android 5') !== FALSE){
		echo "Lollipop";		
	} else {
		echo "No lollipop";
	}
} else if (strpos($browser,'iPhone') !== FALSE) {
	echo("Iphone\n");
	header("location: fb://profile/1550316151894751");
}
?>