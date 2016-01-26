<title>Inicia sesión</title>

	
   <body>

	<div id="fb-root"></div>
	<script>

		var finished_rendering = function() {
			$('#loader').hide();
			console.log("finished rendering plugins");
		}
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo $config["fbApp"]["appId"]; ?>',
		      xfbml      : true,
		      version    : 'v2.4'
		    });
		    
		FB.Event.subscribe('xfbml.render', finished_rendering);

		var referrer = document.referrer;	
		var browserAgent = navigator.userAgent
		console.log(referrer);	
		console.log(browserAgent);
		FB.getLoginStatus(function(response) {
		  if (response.status === 'connected') {
		    ga('send', 'event', "step 1", 'facebook login status', 'logged');
		    console.log('logged and authorized');
//			document.location.href = '<?php echo $loginUrl;?>';
		    var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;
		  } else if (response.status === 'not_authorized') {
		    console.log('logged');
		    ga('send', 'event', "step 1", 'facebook login status', 'logged');
		  }	else{
		    console.log('not logged');
		    ga('send', 'event', "step 1", 'facebook login status', 'not logged');	
			  				
			if(referrer.indexOf("facebook") <= -1 ){
				if (browserAgent.indexOf("iPhone") > -1){
					console.log("iPhone detected");
//					$('#indexModal').modal('show');
					document.location.href = 'openapp.php';
					// modalButton.setAttribute('href', 'fb://profile/1550316151894751');
				} else if (browserAgent.indexOf("Android") > -1){
					if (browserAgent.indexOf("Android 5") > -1 || browserAgent.indexOf("Android 6") > -1){
						console.log("Android lollipop detected");
						document.location.href = 'openapp.php';	
//						modalButton.setAttribute('href', 'fb://page/1550316151894751');
						$('#indexModal').modal('show');
					} else if (browserAgent.indexOf("Android 4.4") > -1){
						console.log("Android Kitkat detected");
					} else {
						console.log("Old Android detected");
				   	}
			  	} else {
					console.log("Model not detected");
			  	}
			 }
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
		
		postclick = function () {
			window.location = "<?php echo $loginUrl;?>";										
		}	
	</script>

	<div class="container-fluid">
		
		<div id="loader" style="display: block; width: 100vh; height: 100vh; z-index: 9; position: absolute; background-color: rgba(0, 0, 0, 0.51);">
			<div class="wrapper vertical-center">
				<div class="cssload-loader btn-centered" style="z-index: 10; top: 45vh; margin: auto;"></div>
			</div>
		</div>	
		<div id="upper-div" style="height: 74vh; width: 100vw;" class="blue">
		<div class="div-wrapper full login-img">
		</div>
		</div>
	    <footer style="height: 24vh; width: 100vw;">
		      <p class="fnbt-name-text grey-text">Es tu primera ves con Fanbot<br>¡Disfruta la experiencia!<p>
			  <a class="waves-effect waves-light btn fb-btn btn-centered" style=" background-color: #405A9F; font-size: 3vw;" onclick="postclick();"><i class="mdi mdi-facebook left" style=" font-size: 4vw !important;"></i>Continuar con facebook</a>
	    </footer>
<script>
	// On document ready set the div height to window
	$(document).ready(function(){ 
		
		// Assign a variable for the application being used
		var nVer = navigator.appVersion;
		// Assign a variable for the device being used
		var nAgt = navigator.userAgent;
		var nameOffset,verOffset,ix;
		
		
		// First check to see if the platform is an iPhone or iPod
		if(navigator.platform == 'iPhone' || navigator.platform == 'iPod'){
			// In Safari, the true version is after "Safari" 
			if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
			  // Set a variable to use later
			  var mobileSafari = "Safari";
			}
		}
		
		// Se the div height
		$('#container-fluid').css({'height':(($(window).height()))+'px'});
		// if mobileSafari add +60px
		if(mobileSafari == 'Safari'){ $('#right-sidebar').css('height','+=60'); };
	});
		
	// On window resize run through the sizing again
	$(window).resize(function(){
		$('#container-fluid').css({'height':(($(window).height()))+'px'});
		// if mobileSafari add +60px
		if(mobileSafari == 'Safari'){ $('#right-sidebar').css('height','+=60'); };
	});
</script>
	</div>
	

    </body>
  </html>