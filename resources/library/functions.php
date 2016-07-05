<?php

	require(realpath(dirname(__FILE__) . "/../config.php"));
	
	require_once ( './vendor/autoload.php' );


//////////////////// Facebook sdk functions start  ////////////////////

	function getUserFbInfo($token){


		require(realpath(dirname(__FILE__) . "/../config.php"));		
			$servername = $config["db"]["fanbot"]["host"];
			$username = $config["db"]["fanbot"]["username"];
			$password = $config["db"]["fanbot"]["password"];
			$dbname = $config["db"]["fanbot"]["dbname"];


		$fb = new Facebook\Facebook([
		  'app_id' => $config["fbApp"]["appId"],
		  'app_secret' => $config["fbApp"]["appSecret"],
		  'default_graph_version' => 'v2.6',
		  //'default_access_token' => '{access-token}', // optional
		]);
		
		$fb->setDefaultAccessToken( $token->{'access_token'} );
		// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
		//   $helper = $fb->getRedirectLoginHelper();
		//   $helper = $fb->getJavaScriptHelper();
		//   $helper = $fb->getCanvasHelper();
		//   $helper = $fb->getPageTabHelper();
		
		try {
		  // Get the Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  $response = $fb->get('/me?fields=friends');
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		
		$me = $response->getGraphUser();

		$_SESSION['fbUser']['id'] = $me->getId();
		$_SESSION['fbUser']['link'] = $me->getLink();
		$_SESSION['fbUser']['name'] = $me->getName();
		$_SESSION['fbUser']['email'] = $me->getEmail();
		$_SESSION['fbUser']['firstName'] = $me->getFirstName();
		$_SESSION['fbUser']['lastName'] = $me->getLastName();
		$_SESSION['fbUser']['gender'] = $me->getGender();
		$_SESSION['fbUser']['friends'] = $me->getField('friends');
	}


	function fbCode2token($code){

		require(realpath(dirname(__FILE__) . "/../config.php"));		

		// Get de JSON text containing the token 
		$codeToToken = file_get_contents('https://graph.facebook.com/v2.3/oauth/access_token?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&client_secret='.$config["fbApp"]["appSecret"].'&code='. $code);

		$token = json_decode($codeToToken);
		
		return $token;
	}

    // Get fbPage name for various uses in the app
	function getFbPageName($page){
		$pageJson = file_get_contents('https://graph.facebook.com/'. $page .'?access_token=1498446833779418|6Uo2HajAgYUiIE0x8DR1AXuhxbw');
		$pageArray = json_decode($pageJson, true);
		echo $pageArray['name'];
	}


	function fbPost($code){
		require(realpath(dirname(__FILE__) . "/../config.php"));		
			$servername = $config["db"]["fanbot"]["host"];
			$username = $config["db"]["fanbot"]["username"];
			$password = $config["db"]["fanbot"]["password"];
			$dbname = $config["db"]["fanbot"]["dbname"];

		// Initialize the Facebook app using the application ID and secret.
		FacebookSession::setDefaultApplication( $config["fbApp"]["appId"],$config["fbApp"]["appSecret"] );

		// Get de JSON text containing the token 
		$codeToToken = file_get_contents('https://graph.facebook.com/v2.3/oauth/access_token?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&client_secret='.$config["fbApp"]["appSecret"].'&code='. $code);

		$token = json_decode($codeToToken );

		$pageJson = file_get_contents('https://graph.facebook.com/'. $_SESSION['fnbt']['config']['link'] .'?fields=location&access_token=1498446833779418|6Uo2HajAgYUiIE0x8DR1AXuhxbw');
		$pageArray = json_decode($pageJson, true);
		// Get new fb session
		if (!isset($session)) {
		  try {
		    $session = new FacebookSession($token->{'access_token'});	    
		  } catch(FacebookRequestException $e) {
		    unset($session);
		    echo $e->getMessage();
		  }
		}

		// Post to FB
		if (isset($session)) {
		// Get fbPageId for facebook post
		$page = (new FacebookRequest($session, 'GET', $_SESSION['fnbt']['config']['link']))->execute()->getGraphObject(GraphUser::className());
		$pageId = $page->getId();		
		// fbPost array wiht the post info

		if($_SESSION['fnbt']['name'] == 'futy'){
				$linkData = [
			  'link' => 'https://www.facebook.com/277802179240254',
	//			  'message' => '',
	//		  'place' => $pageId,
	
			  ];						
		} else if ($_SESSION['fnbt']['config']['link'] == 'fanbot'){
			$linkData = [
			  'link' => 'https://www.facebook.com/247746702276983',
	//			  'message' => '',
	//		  'place' => $pageId,
	
			  ];				
		} else if (isset( $pageArray['location']['latitude'])){
			$linkData = [
			  'place' => $pageId,
	//			  'message' => '',
			  ];
		} else {
			$linkData = [
			  'link' => 'https://www.facebook.com/'. $_SESSION['fnbt']['config']['link'],
	//			  'message' => '',
	//		  'place' => $pageId,
	
			  ];			
		}

		$post= (new FacebookRequest($session, 'POST', '/me/feed',  $linkData))->execute()->getGraphObject(GraphUser::className());

		}
		
	}
//////////////////// Facebook sdk functions end  ////////////////////
	
//////////////////// DB functions start  ////////////////////

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
				
		$sql = "SELECT * FROM users WHERE fbID = '". $_SESSION['fbUser']['id']. "'";
		$result = $conn->query($sql);
		
		if ($result->num_rows >= 1) {	

				$sql = "UPDATE users SET `friends` = '". $_SESSION['fbUser']['friends'] ."' WHERE fbID= '". $_SESSION['fbUser']['id']. "'";
				    
			} else {
				$sql = "INSERT INTO users (fbID, fbName, firstName, lastName, email, gender, friends) VALUES ( '". $_SESSION['fbUser']['id']. "','". $_SESSION['fbUser']['name']. "','". $_SESSION['fbUser']['firstName']. "','". $_SESSION['fbUser']['lastName']. "','". $_SESSION['fbUser']['email'] ."','". $_SESSION['fbUser']['gender']."',  '". $_SESSION['fbUser']['friends'] ."')";

		}

		if ($conn->query($sql) === TRUE) {
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		print_r($sql);
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

				$sql = "INSERT INTO interactions  (fanbotId, userId, clientId, fbPage, action) VALUES ( '". $_SESSION['fnbt']['id']. "','".  $_SESSION['fbUser']['id']. "','". $_SESSION['fnbt']['clientId']. "','". $_SESSION['fnbt']['config']['link'] . "', '". $_SESSION['action'] ."')";
							
				
				if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				if($_SESSION['fnbt']['plan'] == 1 || $_SESSION['fnbt']['plan'] == 2){

					$sql = "UPDATE fanbot SET credit = credit - 1 WHERE id = '". $_SESSION['fnbt']['id'] ."'";
					
					if ($conn->query($sql) === TRUE) {
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$sql = "UPDATE fanbot SET estatus = 0 WHERE credit = 0 AND id = '". $_SESSION['fnbt']['id'] ."'";

					if ($conn->query($sql) === TRUE) {
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}

				}
				
				$conn->close();
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
			    			        
		        $_SESSION['fnbt']['id'] = $row["id"];
		        $_SESSION['fnbt']['name'] = $row["name"];
		        $_SESSION['fnbt']['clientId'] = $row["clientId"];
		        $_SESSION['fnbt']['accesToken'] = $row["accesToken"];
		        $_SESSION['fnbt']['deviceId'] = $row["deviceId"];
		        $_SESSION['fnbt']['plan'] = $row["plan"];
		        $_SESSION['fnbt']['status'] = $row["estatus"];
		        $_SESSION['fnbt']['config'] = json_decode($row["config"], true);

			    }

					return 1;

			} else {
				return 0;

			}
	}		
	
	function notLiked(){

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
		
		$sql = "SELECT * FROM interactions WHERE userId = '". $_SESSION['fbUser']['id'] ."' AND fbPage = '". $_SESSION['fnbt']['config']['link'] . "';";	
		$result = $conn->query($sql);
		$conn->close();		

		if ($result->num_rows == 0) {		    
			return 1;	
		} else {
			return 0;
		}

	}	
	
	function notChekedin(){

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
		
		$sql = "SELECT * FROM interactions WHERE userId = '". $_SESSION['fbUser']['id'] ."' AND fbPage = '". $_SESSION['fnbt']['config']['link'] . "' AND TIMESTAMPDIFF(HOUR,date,NOW()) <= 18;";	
		$result = $conn->query($sql);
		$conn->close();		
		
		if ($result->num_rows == 0) {		    
			    return 1;	
			} else {
				return 0;
			}
	}
	
	function checkInteraction(){
		if ($_SESSION['fnbt']['config']['type'] == 'like' && notLiked() ){
			$_SESSION['action'] = 'like';
			return TRUE;		
		} else if ($_SESSION['fnbt']['config']['type'] == 'post' && notLiked()  ){
			$_SESSION['action'] = 'like';
			return TRUE;					
		} else if($_SESSION['fnbt']['config']['type'] == 'post' && notChekedin() ){
			$_SESSION['action'] = 'post';
			return TRUE;				
		} else {
			return FALSE;
		}
	}

////////////////////  DB functions end  ////////////////////

//////////////////// Particle functions start  ////////////////////

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

//////////////////// Particle functions end  ////////////////////

//////////////////// Miscellaneous functions  ////////////////////
	
	function timeStamp(){
		echo date("is");
	}		


    // Funcion que revisa el color de las pelotas.	
	function colorCheck(){


		$getColor = file_get_contents('https://api.particle.io/v1/devices/51ff6d065082554938420887/ballNumber?access_token=8f143ea31dd63ec40437558c3d352b560a2dfcd4');
		$colorArray = json_decode($getColor,true);
		
		return $colorArray['result'];
	}

	function sendMail($color){

		switch ($color){
			case '1': $texto = file_get_contents('buenfin/amarilla.txt', "r");
				break;
			case '2': $texto = file_get_contents('buenfin/verde.txt', "r");
				break;
			case '3': $texto = file_get_contents('buenfin/azul.txt', "r");
				break;
			default; $texto = file_get_contents('buenfin/amarilla.txt', "r");
				break;
		}
		

		$para      = $_SESSION['fbUser']['email']. '.btag.it';
		$titulo    = 'Tu premio Fanbot';
		$mensaje   = $texto;
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$cabeceras .= 'From: Gerardo Ruiz <gerardo@fanbot.me>' . "\r\n";


		mail($para, $titulo, $mensaje, $cabeceras);		
	}
	
	function sendGrid($color){

		switch ($color){
			case '1': $texto = file_get_contents('buenfin/amarilla.txt', "r");
				break;
			case '2': $texto = file_get_contents('buenfin/verde.txt', "r");
				break;
			case '3': $texto = file_get_contents('buenfin/azul.txt', "r");
				break;
			default; $texto = file_get_contents('buenfin/amarilla.txt', "r");
				break;
		}


		$url = 'https://api.sendgrid.com/';
		$user = 'PayTime';
		$pass = '?V53Q@*v';
		
		$params = array(
		    'api_user'  => $user,
		    'api_key'   => $pass,
		    'to'        => $_SESSION['fbUser']['email'],
		    'subject'   => 'Tu premio Fanbot',
		    'html'      => $texto,
		    'from'      => 'gerardo@fanbot.me',
		  );
		
		
		$request =  $url.'api/mail.send.json';
		
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		// Tell PHP not to use SSLv3 (instead opting for TLS)
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		
		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		// print everything out
//		print_r($response);
	}
	
?>

