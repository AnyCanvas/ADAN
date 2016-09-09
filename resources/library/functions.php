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
		
		$fb->setDefaultAccessToken( $token );
		// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
		//   $helper = $fb->getRedirectLoginHelper();
		//   $helper = $fb->getJavaScriptHelper();
		//   $helper = $fb->getCanvasHelper();
		//   $helper = $fb->getPageTabHelper();
		
		try {
		  // Get the Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  $response = $fb->get('/me?fields=id,name,last_name,first_name,friends,email,gender,birthday');
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



	function fbLoginLink($scopes){

		require(realpath(dirname(__FILE__) . "/../config.php"));		
		$fb = new Facebook\Facebook([
		  'app_id' => $config["fbApp"]["appId"],
		  'app_secret' => $config["fbApp"]["appSecret"],
		  'default_graph_version' => 'v2.6',
		  ]);
		
		$helper = $fb->getRedirectLoginHelper();
		
		$permissions = $scopes; // Optional permissions
		$loginUrl = $helper->getLoginUrl('http://'. $_SERVER['HTTP_HOST'] .'/node.php', $permissions);		

		return $loginUrl;
	}

	function fbCode2token($code){

		require(realpath(dirname(__FILE__) . "/../config.php"));		
		$fb = new Facebook\Facebook([
		  'app_id' => $config["fbApp"]["appId"],
		  'app_secret' => $config["fbApp"]["appSecret"],
		  'default_graph_version' => 'v2.6',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		
		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}
				
		return (string) $accessToken;
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

		$fb = new Facebook\Facebook([
		  'app_id' => $config["fbApp"]["appId"],
		  'app_secret' => $config["fbApp"]["appSecret"],
		  'default_graph_version' => 'v2.6',
		  //'default_access_token' => '{access-token}', // optional
		]);
		
		$token = fbCode2token($code);
		$fb->setDefaultAccessToken( $token );

		$pageJson = file_get_contents('https://graph.facebook.com/'. $_SESSION['fnbt']['config']['link'] .'?fields=location&access_token=1498446833779418|6Uo2HajAgYUiIE0x8DR1AXuhxbw');
		$pageArray = json_decode($pageJson, true);


		// Get fbPageId for facebook post
		$pageId = $pageArray["id"];		
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

		$post = $fb->post('/me/feed', $linkData );
		
	}
//////////////////// Facebook sdk functions end  ////////////////////

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
	
?>

