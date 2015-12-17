<?php
	session_start();
	include 'resources/library/functions.php'; 

	if($_SESSION['config']['type'] == 'like'){	
		$loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='. 
				    $config["fbApp"]["appId"] .'&redirect_uri='. 
		            $config["urls"]["baseUrl"] .
		            '/node.php&scope=public_profile, email&response_type=code';
	} else if ($_SESSION['config']['type'] == 'post'){
		$loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='. 
		            $config["fbApp"]["appId"] .
		            '&redirect_uri='. $config["urls"]["baseUrl"] .
		            '/node.php%3Fstep%3D2&scope=public_profile, email,publish_actions&response_type=code';
	}

	if(isset($_GET["name"])){
    	$fnbtName  = htmlspecialchars($_GET["name"]);
		if (findFnbt($fnbtName)) { 	

			if($_SESSION['status'] == 0){
				$_SESSION['error'] = 2;
				header("location: ./resources/library/error.php");
			} else if ($_SESSION['config']['socialnetwork'] == 'facebook'){	
				if($_SESSION['config']['type'] == 'like'){	
					require_once("resources/actions/facebook/like.php");
				} else if ($_SESSION['config']['type'] == 'post'){
					require_once("resources/actions/facebook/login.php");
				}
		} 
		
		}else {
			$_SESSION['nameErr'] = TRUE;
			header("location: ./index.php");
		}			
	} else if(isset($_GET["step"])){
		if ($_GET["step"] = '1'){
			require_once("resources/actions/facebook/post.php");					
		} else if ($_GET["step"] = '2'){
			require_once("resources/actions/surveys/rate.php");					
			
		}
	} else if(isset($_GET["code"]) && (!isset($_COOKIE["lastPost"]) || $_SESSION['config']['type'] == 'like')){

		if($_SESSION['config']['type'] == 'like'){	
		    getUserFbInfo($_GET["code"]);
			header("location: ./final.php");
		} else if ($_SESSION['config']['type'] == 'post'){
		    getUserFbInfo($_GET["code"]);
			header("location: ./final.php");
		}			    
    } else if( isset($_GET["error"]) ) {
	    $_SESSION['pageNumber'] = 3;
	    $_SESSION['error'] = 0;
	    require_once("resources/library/error.php");

	} else if(isset($_COOKIE["lastPost"])) {
	    $_SESSION['error'] = 0;
	    require_once("resources/library/error.php");
	} else {
		header("location: ./index.php");
		
	}
	    ?>
