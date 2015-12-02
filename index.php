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
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '<?php echo $config["fbApp"]["appId"]; ?>',
			      xfbml      : true,
			      version    : 'v2.4'
			    });

			FB.getLoginStatus(function(response) {
			  if (response.status === 'connected') {
			    ga('send', 'event', "step 1", 'facebook login status', 'logged');
			    console.log('logged');
			    var uid = response.authResponse.userID;
			    var accessToken = response.authResponse.accessToken;
			  } else if (response.status === 'not_authorized') {
			    console.log('logged');
			    ga('send', 'event', "step 1", 'facebook login status', 'logged');
			  }	else{
			    console.log('not logged');
			    ga('send', 'event', "step 1", 'facebook login status', 'not loged');							  
				var browserAgent = navigator.userAgent
				if (browserAgent.indexOf("iPhone") > -1){
					console.log("iPhone detected");
				} else if (browserAgent.indexOf("Android") > -1){
					if (browserAgent.indexOf("Android 5") > -1){
						console.log("Android lollipop detected");
					} else if (browserAgent.indexOf("Android 4.4") > -1){
						console.log("Android Kitkat detected");
					} else {
						console.log("Android Kitkat detected");
				   	}
			  	}
			}	

  			});

			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

       <div class="container-fluid">
            <!-- Input and button to next page columns-->
            <div class="row mid-row center-block"
                 style="padding-top: 3em;">
                <div class="col-xs-1"></div>
                <div class="col-xs-10">
                    <p class="text-center text-nowrap"
                       style="color: white; font-size: 1.2em;">
                        Escribe el nombre de la Fanbot
                    </p>
                </div>
                <div class="col-xs-1"></div>
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-12">
                    <div id="indexDiv"
                         class="center-block">
                        <div class="col-xs-5"
                             style="padding: 0px;">
                            <img src="media/images/maquina.png"
                                 class="img-responsive center-block"
                                 alt="maquina"
                                 style="height: 160px; margin-right: 0;">
                        </div>
                        <div class="col-xs-7"
                             style="padding: 0px;">
                            <form class="form"
                                  action="node.php"
                                  method="get"
                                  style="padding-top: 50px; padding-left: 0px;">
                                <div class="input-group square-box">
                                    <input type="text"
                                         class="form-control input-lg text-center lead text-lowercase inline-text square-box"
                                         name="name">
                                    <span class="input-group-btn">
										<button class="btn btn-lg next-btn square-box" type="submit">
											<span class="glyphicon glyphicon-chevron-right"></span>
										</button>
									</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Logo img-->

                <div class="fb_logo-row row bottom">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <img class="img-responsive center-block"
                             src="media/clients/logos/fanbot.png"
                             alt="fanbot"
                             width="200">
                    </div>
                    <div class="col-xs-4"></div>
                </div>

        </div>
</body>