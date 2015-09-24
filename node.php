<?php
	session_start();
	include 'resources/library/functions.php'; 
			
			$loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='. $config["fbApp"]["appId"] .'&redirect_uri='. $config["urls"]["baseUrl"] .'/node.php&scope=public_profile, email, user_posts, user_likes&response_type=code';


			if(isset($_GET["name"])){
		    	$fnbtName  = htmlspecialchars($_GET["name"]);
				if (findFnbt($fnbtName)) { 	

					if($_SESSION['status'] == 0){
						$_SESSION['error'] = 2;
						header("location: ./resources/library/error.php");
					} else {				
						require_once("resources/library/action.php");
				} 
				
				}else {
					$_SESSION['nameErr'] = TRUE;
					header("location: ./index.php");
				}			
			} else if(isset($_GET["code"])){
			    getUserFbInfo($_GET["code"]);
				require_once("resources/library/action.php");

		    } else if(isset($_GET["error"])) {
			    $_SESSION['pageNumber'] = 3;
			    $_SESSION['error'] = 0;
			    require_once("resources/library/error.php");
			} else {
				header("location: ./index.php");
				
			}
			    ?>
