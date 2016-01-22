<?php 	
	session_start();
	include 'resources/library/functions.php'; 
    $loginUrl = 'https://www.facebook.com/dialog/oauth?client_id='.$config["fbApp"]["appId"].'&redirect_uri='.$config["urls"]["baseUrl"].'/node.php&scope=public_profile,email&response_type=code';	
?>
<title>Inicia sesión</title>

	
   <body>

	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo $config["fbApp"]["appId"] ?>',
		      xfbml      : true,
		      version    : 'v2.5'
		    });

			FB.Event.subscribe('xfbml.render', finished_rendering);

		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));

			postclick = function () {
				window.location = "<?php echo $loginUrl;?>";										
			}	
  
	</script>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div style="height: 75%;" class="blue">
		<div class="div-wrapper full login-img">
		</div>
		</div>
	    <footer style="height: 25%;">
		      <p class="fnbt-name-text grey-text">Es tu primera ves con Fanbot<br>¡Disfruta la experiencia!<p>
			  <a class="waves-effect waves-light btn fb-btn btn-centered" style=" background-color: #405A9F; font-size: 3vw;" onclick="postclick();"><i class="mdi mdi-facebook left" style=" font-size: 4vw !important;"></i>Continuar con facebook</a>
	    </footer>

	</div>
    </body>
  </html>