<?php
	session_start();
	$_SESSION['pageNumber'] = 1;
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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-65249445-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
</head>
</head>
<body>	
	<div id="fb-root"></div>
		<script>
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '1645168355707000',
			      xfbml      : true,
			      version    : 'v2.4'
			    });

				FB.getLoginStatus(function(response) {
				  var browserAgent = navigator.userAgent
				  if (response.status === 'connected' || $_GET["mode"] == 'web') {
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
		</script>


</body>