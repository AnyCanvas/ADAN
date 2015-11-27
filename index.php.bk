<?php
	session_start();
	$_SESSION['pageNumber'] = 1;
	include 'resources/library/functions.php'; 

	?>
<html>
<head>
	<title>Bienvenido a Fanbot</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script src="js/common.js"></script>
</head>
</head>
<body>	
	<div id="fb-root"></div>
		<script>
<?php if ( !isset($_COOKIE["nodeFlag"]) ){ setcookie("nodeFlag", "1", time()+60*30); ?>
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '<?php echo $config["fbApp"]["appId"]; ?>',
			      xfbml      : true,
			      version    : 'v2.4'
			    });

				FB.getLoginStatus(function(response) {
				  var browserAgent = navigator.userAgent
				  if (response.status === 'connected'<?php 
					  									if(isset($_GET["mode"])) { 
						  									echo ' || true';
						  									} ?>) {
				   		$(function(){ $("body").load("resources/index/index.php"); });
				    var uid = response.authResponse.userID;
				    var accessToken = response.authResponse.accessToken;
				  } else if (response.status === 'not_authorized') {
				  	$(function(){ $("body").load("resources/index/index.php"); });
				  } else if (browserAgent.indexOf("iPhone") > -1){
					   $(function(){ $("body").load("resources/index/iphone.php"); });
				   } else if (browserAgent.indexOf("Android") > -1){
				   		if (browserAgent.indexOf("Android 5") > -1){
					   		$(function(){ $("body").load("resources/index/android5.php"); });
				   		} else if (browserAgent.indexOf("Android 4.4") > -1){
					   		$(function(){ $("body").load("resources/index/android4.php"); });					   		
				   		} else {
				   		$(function(){ $("body").load("resources/index/index.php"); });
				   		}
				  } else {
				   	$(function(){ $("body").load("resources/index/index.php"); });					  
				  }
				 });
			  };
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			<?php } else {
				echo '$(function(){ $("body").load("resources/index/index.php"); });';
			} ?>
		</script>


</body>