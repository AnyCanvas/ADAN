<?php
// echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($browser,'FBAV') !== FALSE){		
	require_once("resources/index/legacy.php");
} else if (strpos($browser,'Android 5') !== FALSE){		
/**	header("location: fb:/ /page/1550316151894751"); **/

	require_once("resources/index/android.php");

} else if (strpos($browser,'iPhone') !== FALSE) {
/**	header("location: fb:/ /profile/1550316151894751"); **/
	require_once("resources/index/iphone.php");

} else {
	require_once("resources/index/legacy.php");
	}
?>