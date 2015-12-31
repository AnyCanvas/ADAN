<?php
	session_start();
	include 'resources/library/functions.php'; 

	?>
<!DOCTYPE html>
<html>
<head>
<?php require_once( "resources/html/header.php" ); ?>
	<title>Fanbot</title>
</head>

<?php
	$loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&scope=public_profile, email&response_type=code';

			if(isset($_SESSION['page'])){
				switch ($_SESSION['page']) {

				    case 1:
						if(isset($_GET["name"])){
					    	$fnbtName  = htmlspecialchars($_GET["name"]);
							if (findFnbt($fnbtName)) { 	
								if($_SESSION['fnbt']['status'] == 0){
									$_SESSION['error'] = 2;
									header("location: ./resources/library/error.php");
								} else{	
									$_SESSION['page'] = 2;
									require_once("resources/html/login.php");
								} 
							}else {
								header("location: ./index.php?error=1");
							}			
						} else {
							header("location: ./index.php");							
						}
				        break;

				    case 2:
				    	if(isset($_GET["code"])){
							if ($_SESSION['fnbt']['config']['socialnetwork'] == 'facebook'){	
								$_SESSION['pageNumber'] = 3;
								if($_SESSION['fnbt']['config']['type'] == 'like'){	
									require_once("resources/actions/facebook/like.php");
								} else if ($_SESSION['fnbt']['config']['type'] == 'post'){
									require_once("resources/actions/facebook/post.php");
								}
							} else {
							}
						}
				        break;

				    case 3:
				        break;

				    default:
				    	break;
				}
			}
?>

</html>
