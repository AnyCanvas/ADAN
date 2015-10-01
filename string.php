<?php
// echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($browser,'Android') !== FALSE){
	echo "\nAndroid\n";
	if (strpos($browser,'Android 5') !== FALSE){
	echo "Lollipop";		
	header("location: fb://profile/1550316151894751");
	} else {
		echo "No lollipop";
	}
} else if (strpos($browser,'iPhone') !== FALSE) {
	header("location: fb://profile/1550316151894751");
}
?>