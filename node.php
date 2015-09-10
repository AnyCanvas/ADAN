<?php
	session_start();
	include 'resources/library/functions.php'; 
			
			$loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='. $config["fbApp"]["appId"] .'&redirect_uri='. $config["urls"]["baseUrl"] .'/node.php&scope=public_profile, email&response_type=code';
			switch ($_SESSION['pageNumber']) {
		    case 1:
		    	$fnbtName  = htmlspecialchars($_GET["name"]);
				if (findFnbt($fnbtName)) { 	
					if($_SESSION['status'] == 0){
						$_SESSION['pageNumber'] = 1;
						$_SESSION['error'] = 2;
						echo "<script>window.location='resources/library/error.php';</script>";	
						$_SESSION['pageNumber'] = 1;

					} else {

					$_SESSION['pageNumber'] = 2;				
					require_once("resources/library/action.php");
					}
					} else {

							$_SESSION['nameErr'] = TRUE;							
					}
				break;
		    case 2:
		    	if(isset($_GET["code"])){
			    	$_SESSION['pageNumber'] = 3;
			    	getUserFbInfo($_GET["code"]);
					require_once("resources/library/action.php");

		    	} else if(isset($_GET["error"])) {
			    	$_SESSION['pageNumber'] = 3;
			    	$_SESSION['error'] = 0;
			    	require_once("resources/library/error.php");
					}
				break;
		}
		
		echo $_SESSION['pageNumber'];
			    ?>
