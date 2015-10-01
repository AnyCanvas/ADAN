<?php
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($a,'Android') !== FALSE){
	echo "Android\n";
} else if (strpos($a,'Iphone') !== FALSE) {
	echo "Iphone\n";
}
?>