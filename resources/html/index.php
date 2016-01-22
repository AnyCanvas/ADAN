
 
<body>
	<div id="fb-root"></div>
	
	<script>
			
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '<?php echo $config["fbApp"]["appId"]; ?>',
			      xfbml      : true,
			      version    : 'v2.4'
			    });

			var referrer = document.referrer;	
			var browserAgent = navigator.userAgent
			console.log(referrer);	
			console.log(browserAgent);
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
			    ga('send', 'event', "step 1", 'facebook login status', 'not logged');	
				  				
				if(referrer.indexOf("facebook") <= -1 ){
					if (browserAgent.indexOf("iPhone") > -1){
						console.log("iPhone detected");
						$('#indexModal').modal('show');
						modalButton.setAttribute('href', 'fb://profile/1550316151894751');
					} else if (browserAgent.indexOf("Android") > -1){
						if (browserAgent.indexOf("Android 5") > -1 || browserAgent.indexOf("Android 6") > -1){
							console.log("Android lollipop detected");
							modalButton.setAttribute('href', 'fb://page/1550316151894751');
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

	</script>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div style="height: 75%;" class="blue">
		<div class="div-wrapper full" style="padding-top: top: 40vh !important;">
			<img class="center-align center-img index-img" src="images/fanbot_label.png"  />
		</div>
		</div>
	    <footer style="height: 25%;">
		      <p class="fnbt-name-text grey-text">Escribe la palabra de la etiqueta Azul</p>
		      <input  class="fnbt-name-input white-text" ></input>
			<a class="button-div btn-floating btn-large waves-effect green accent-2"><i class="material-icons white-text">arrow_forward</i></a>

	    </footer>

	</div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
</body>