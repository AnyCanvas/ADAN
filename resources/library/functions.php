<?php

	require(realpath(dirname(__FILE__) . "/../config.php"));
	
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookSession.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/HttpClients/FacebookCurl.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/HttpClients/FacebookHttpable.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/HttpClients/FacebookCurlHttpClient.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookResponse.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookRequest.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookSDKException.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookRequestException.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookAuthorizationException.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/Entities/SignedRequest.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/Entities/AccessToken.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookSignedRequestFromInputHelper.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/FacebookRedirectLoginHelper.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/GraphObject.php') );
	require_once ( realpath(dirname(__FILE__) . '/facebook/facebook-php-sdk-v4/src/Facebook/GraphUser.php') );
	 
	use Facebook\FacebookSession;
	use Facebook\FacebookRequest;
	use Facebook\FacebookJavaScriptLoginHelper;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\Graphuser; 
	use Facebook\FacebookRequestException;	
		
	function getFbPageName($page){
		$pageJson = file_get_contents('https://graph.facebook.com/'. $page .'?access_token=1498446833779418|6Uo2HajAgYUiIE0x8DR1AXuhxbw');
		$pageArray = json_decode($pageJson, true);
		echo $pageArray['name'];
	}

	function getUserFbInfo($code){

	
		require(realpath(dirname(__FILE__) . "/../config.php"));		
			$servername = $config["db"]["fanbot"]["host"];
			$username = $config["db"]["fanbot"]["username"];
			$password = $config["db"]["fanbot"]["password"];
			$dbname = $config["db"]["fanbot"]["dbname"];

		// Initialize the Facebook app using the application ID and secret.
		FacebookSession::setDefaultApplication( $config["fbApp"]["appId"],$config["fbApp"]["appSecret"] );
		
		// Get de JSON text containing the token 
		$codeToToken = file_get_contents('https://graph.facebook.com/v2.3/oauth/access_token?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&client_secret='.$config["fbApp"]["appSecret"].'&code='. $code);
		$token = json_decode($codeToToken);


			
		//get new session
		if (!isset($session)) {
		  try {
		    $session = new FacebookSession($token->{'access_token'});	    
		  } catch(FacebookRequestException $e) {
		    unset($session);
		    echo $e->getMessage();
		  }
		}
		 
		$page = (new FacebookRequest($session, 'GET', $_SESSION['config']['link']))->execute()->getGraphObject(GraphUser::className());
		$pageId = $page->getId();
		
		if(!isset($_COOKIE["message"])) {
			    $message = "Cookie is not set!";
			} else {
			    $message =  $_COOKIE["message"];
			}
		$linkData = [
		  'link' => 'https://www.facebook.com/'. $_SESSION['config']['link'],
		  'message' => $message,
		  'place' => $pageId,
		  ];
		  
		//do some api stuff
		if (isset($session)) {

		  $me = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
		  
		  
//		  if($_SESSION['config']['socialnetwork'] == 'facebook'){
//			  if($_SESSION['config']['type'] == 'post'){
//			  	$post= (new FacebookRequest($session, 'POST', '/me/feed',  $linkData))->execute()->getGraphObject(GraphUser::className());
//			  }
//		  }

		  $_SESSION['fbUserId'] = $me->getId();
		  $_SESSION['fbUserLink'] = $me->getLink();
		  $_SESSION['fbUserName'] = $me->getName();
		  $_SESSION['fbUserEmail'] = $me->getEmail();
		  $_SESSION['fbUserFirstName'] = $me->getFirstName();
		  $_SESSION['fbUserLastName'] = $me->getLastName();
		  $_SESSION['fbUserGender'] = $me->getGender();
		}
	}

// Funcion que revisa el color de las pelotas.	
	function colorCheck(){
		
		switch ($colorArray['result']){
			case '1': $color = 'Rojo';
				break;
			case '2': $color = 'Verde';
				break;
			case '3': $color = 'Azul';
				break;
			default;
				break;
		}

		$getColor = file_get_contents('https://api.particle.io/v1/devices/51ff6d065082554938420887/ballNumber?access_token=8f143ea31dd63ec40437558c3d352b560a2dfcd4');
		$colorArray = json_decode($getColor,true);
		$para      = $_SESSION['fbUserEmail'];
		$titulo    = 'Tu premio Fanbot';
		$mensaje   = $color . ' es tu bola';
		$cabeceras = 'From: hello@fanbot.me' . "\r\n" .
		'Reply-To: hello@fanbot.me' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($para, $titulo, $mensaje, $cabeceras);
	};
	
	function saveUserDataToDB(){
				
	
		require(realpath(dirname(__FILE__) . "/../config.php"));		
			$servername = $config["db"]["fanbot"]["host"];
			$username = $config["db"]["fanbot"]["username"];
			$password = $config["db"]["fanbot"]["password"];
			$dbname = $config["db"]["fanbot"]["dbname"];


				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
				
		$sql = "SELECT * FROM users WHERE fbID = '". $_SESSION['fbUserId']. "'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {		    
			} else {
				$sql = "INSERT INTO users (fbID, fbName, firstName, lastName, email, gender) VALUES ( '". $_SESSION['fbUserId']. "','". $_SESSION['fbUserName']. "','". $_SESSION['fbUserFirstName']. "','". $_SESSION['fbUserLastName']. "','". $_SESSION['fbUserEmail'] ."','". $_SESSION['fbUserGender']."')";
				
				if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
				
				$conn->close();
		}

	function saveInteractionToDB(){
				
		require(realpath(dirname(__FILE__) . "/../config.php"));		
			$servername = $config["db"]["fanbot"]["host"];
			$username = $config["db"]["fanbot"]["username"];
			$password = $config["db"]["fanbot"]["password"];
			$dbname = $config["db"]["fanbot"]["dbname"];

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "INSERT INTO interactions  (fanbotId, userId, clientId, fbPage) VALUES ( '". $_SESSION['id']. "','".  $_SESSION['fbUserId']. "','". $_SESSION['clientId']. "','". $_SESSION['config']['link'] . "')";
							
				
				if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				if($_SESSION['fanbotPlan'] == 1 || $_SESSION['fanbotPlan'] == 2){

					$sql = "UPDATE fanbot SET credit = credit - 1 WHERE id = '". $_SESSION['id'] ."'";
					
					if ($conn->query($sql) === TRUE) {
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$sql = "UPDATE fanbot SET estatus = 0 WHERE credit = 0 AND id = '". $_SESSION['id'] ."'";

					if ($conn->query($sql) === TRUE) {
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}

				}
				
				$conn->close();
		}

	function fanbotStatus($deviceId, $accesToken){
		
		$ip = 'api.particle.io';
		$ch = curl_init("https://". $ip ."/v1/devices/". $deviceId.  "/?access_token=". $accesToken);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
	
	
		$curloutput = json_decode($output, true);
		$connectedSpark = $curloutput["connected"];
	
	
	
			if($connectedSpark){
				return 1;
		} else{
			return 0;
		} 
	
	}

	function fanbotAction($deviceId, $accesToken){
		
		$ip = 'api.particle.io';
		$ch = curl_init("https://". $ip ."/v1/devices/". $deviceId.  "/?access_token=". $accesToken);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
	
	
		$curloutput = json_decode($output, true);
		$connectedSpark = $curloutput["connected"];
	
	
	
		if($connectedSpark){
	
	
				$ch = curl_init("https://". $ip ."/v1/devices/". $deviceId.  "/led?access_token=". $accesToken);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "params=D7,HIGH");
				curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$output = curl_exec($ch);
				curl_close($ch);
				return 1;
		} else{
			return 0;
		} 
	
	}
	
	function findFnbt($fnbtName){	
		
		require(realpath(dirname(__FILE__) . "/../config.php"));		
		$servername = $config["db"]["fanbot"]["host"];
		$username = $config["db"]["fanbot"]["username"];
		$password = $config["db"]["fanbot"]["password"];
		$dbname = $config["db"]["fanbot"]["dbname"];

		
			
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT * FROM fanbot WHERE name = '". $fnbtName ."' ";
		$result = $conn->query($sql);

		$conn->close();
		
		if ($result->num_rows > 0) {		    
		    while($row = $result->fetch_assoc()) {
			    			        
		        $_SESSION['id'] = $row["id"];
		        $_SESSION['clientId'] = $row["clientId"];
		        $_SESSION['accesToken'] = $row["accesToken"];
		        $_SESSION['deviceId'] = $row["deviceId"];
		        $_SESSION['fanbotPlan'] = $row["plan"];
		        $_SESSION['status'] = $row["estatus"];
		        $_SESSION['config'] = json_decode($row["config"], true);

			    }

					return 1;

			} else {
				return 0;

			}
	}		
	
	function checkForDuplucatedLike(){

		require(realpath(dirname(__FILE__) . "/../config.php"));		
		$servername = $config["db"]["fanbot"]["host"];
		$username = $config["db"]["fanbot"]["username"];
		$password = $config["db"]["fanbot"]["password"];
		$dbname = $config["db"]["fanbot"]["dbname"];

		
			
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		

		if ($_SESSION['config']['socialnetwork'] == 'facebook'){
			if($_SESSION['config']['type'] == 'like'){
				$sql = "SELECT * FROM interactions WHERE userId = '". $_SESSION['fbUserId'] ." ' AND fbPage = '". $_SESSION['config']['link'] . "'";				
			} else if ($_SESSION['config']['type'] == 'post'){
				return TRUE;	
				exit();			
			}
		}
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {		    

			    return FALSE;	
			} else {
				return TRUE;

			}
		$conn->close();

	}	
	
	function timeStamp(){
		echo date("is");
	}		
?>
