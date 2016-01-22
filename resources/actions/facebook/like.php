 <title>Dale like</title>

    <body>
	<div id="fb-root"></div>
		<script>
						
			
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo $config["fbApp"]["appId"] ?>',
		      xfbml      : true,
		      version    : 'v2.5'
		    });

				FB.Event.subscribe('edge.create', function(targetUrl) {
					ga('send', 'event', 'action', 'facebook', 'like', 1);
					window.location="/final.php";
				});
				FB.Event.subscribe('edge.remove', function(targetUrl) {
					ga('send', 'event', 'action', 'facebook', 'like', 0);
				});
		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
			

		</script>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div style="height: 75%;" class="blue">
		<div class="div-wrapper full" style="background-color: <?php echo $_SESSION['fnbt']['config']["bgcolor"] ?>;">
			<img class="center-img fbpage-img" src="https://graph.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>/picture?type=large" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
		</div>
		</div>
	    <footer style="height: 25%;">
		      <p class="fnbt-name-text grey-text">Presiona “Me Gusta”<br>para accionar la máquina.<p>
			  <div class="like-div" style="overflow: hidden;">
				  <div class="fb-like" 
					   data-href="https://www.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>"
					   data-layout="button" 
					   data-action="like" 
					   data-show-faces="false" 
					   data-share="false">
				  </div>
	    </footer>

	</div>
    </body>
  </html>