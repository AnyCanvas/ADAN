<?php
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($browser,'Android') !== FALSE){
	echo "Android\n";
} else if (strpos($browser,'Iphone') !== FALSE) {
	echo "Iphone\n";
}
?>