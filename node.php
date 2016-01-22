<?php
	session_start();
	include 'resources/library/functions.php'; 

	?>
<!DOCTYPE html>
<html>
<?php require_once( "resources/html/header.php" ); ?>



<?php
	$postCodeUrl = 'https://www.facebook.com/dialog/oauth?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&scope=publish_actions&response_type=code';

	if(isset($_GET["name"])){
	$_SESSION['page'] = 2;		
	}

			if(isset($_SESSION['page'])){
				switch ($_SESSION['page']) {


				    case 1:
				    	if(isset($_GET["code"])){
					    	getUserFbInfo($_GET["code"]);
 							$_SESSION['page'] = 2;
    					    require_once("resources/html/name.php");
    					} else {
							header("location: ./index.php");
						}	
					    break;

				    case 2:
						if(isset($_GET["name"])){
					    	$fnbtName  = htmlspecialchars($_GET["name"]);
							if (findFnbt($fnbtName)) { 	
								if($_SESSION['fnbt']['status'] == 0){
									$_SESSION['error'] = 2;
									header("location: ./resources/library/error.php");
								} else{	
									$_SESSION['page'] = 3;
									if ($_SESSION['fnbt']['config']['socialnetwork'] == 'facebook'){	
										if($_SESSION['fnbt']['config']['type'] == 'like'){	
											require_once("resources/actions/facebook/like.php");
										} else if ($_SESSION['fnbt']['config']['type'] == 'post'){
											require_once("resources/actions/facebook/post.php");
										}
									} else {
										header("location: ./index.php");
									}
								} 
							}else {
								header("location: ./name_error.php");
							}			
						} else {
							header("location: ./index.php");							
						}
				        break;

				    case 3:
				    	if(isset($_GET["code"])){
					    	$_SESSION['page'] = 4;
							if ($_SESSION['fnbt']['config']['socialnetwork'] == 'facebook'){	
								if($_SESSION['fnbt']['config']['type'] == 'like'){	
									require_once("resources/actions/facebook/like.php");
								} else if ($_SESSION['fnbt']['config']['type'] == 'post'){
									require_once("resources/actions/facebook/post.php");
								}
							} else {
								header("location: ./index.php");
							}
						}
				        break;

				    case 4:
					    $_SESSION['page'] = 0;						
						if ($_SESSION['fnbt']['config']['type'] == 'post' && isset($_GET["code"]) ){
							fbPost($_GET["code"]);
							header("location: ./final.php");
						} else if (isset($_GET['step'])){
							$_SESSION['page'] = 3;
							require_once("resources/actions/surveys/rate.php");							
						} else {
							header("location: ./final.php");
						}						
				        break;

				    default:
						header("location: ./index.php");
				    	break;
				}
			} else {
				// header("location: ./index.php");				
			}
?>

</html>
