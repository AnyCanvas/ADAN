 <title>Dale like</title>

    <body>
	<div id="fb-root"></div>
		<script>
	    postclick = function () {
			window.location = "node.php";										
		}						
		var finished_rendering = function() {
			$('#loader').hide();
			console.log("finished rendering plugins");
		}
			
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo $config["fbApp"]["appId"] ?>',
		      xfbml      : true,
		      version    : 'v2.6'
		    });

				FB.Event.subscribe('xfbml.render', finished_rendering);

				FB.Event.subscribe('edge.create', function(targetUrl) {
					$('#loader').show();
					ga('send', 'event', 'action', 'facebook', 'like', 1);
					<?php if ($_SESSION['fnbt']['name'] == 'futy'){ ?> 
					window.location="/foot";
					<?php }else { ?>
					window.location="/final.php";
					<?php } ?>

				});
				FB.Event.subscribe('edge.remove', function(targetUrl) {
					ga('send', 'event', 'action', 'facebook', 'like', 0);
				});
		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/es_LA/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
			

		</script>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div id="loader" style="display: block; width: 100%; height: 100%; z-index: 9; position: absolute; background-color: rgba(0, 0, 0, 0.51);">
			<div class="wrapper vertical-center">
				<div class="cssload-loader btn-centered" style="z-index: 10; top: 45vh; margin: auto;"></div>
			</div>
		</div>
		<div id="upper-div" style="height: 55%; position: relative;" class="blue">
		<div class="div-wrapper full" style="background-color: <?php echo $_SESSION['fnbt']['config']["bgcolor"] ?>;">

		<img class="center-img fbpage-img" src="https://graph.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>/picture?type=large" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
<?php if($_SESSION['fnbt']['config']["type"] == 'post'){ ?>
		<p style="font-size: x-small; text-align: center; padding-top: 5px; background-color: #CEC9C9; position: absolute; bottom: 0; left: 0; width: 100%; margin: 0; padding-bottom: 2px;">Al continuar estarás aceptando el <a href="http://fanbot.me/aviso-de-privacidad/" target="_blank">Aviso de Privacidad</a></p>			
<?php } ?>

		</div>
		</div>
	    <footer style="height: 45%;">
			  <div id="fblike-div">
			      <p class="fnbt-name-text grey-text">Presiona “Me Gusta”<br>para accionar la máquina.</p>
				  <div class="like-div" style="overflow: hidden;">
					  <div class="fb-like" 
						   data-href="https://www.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>"
						   data-layout="button" 
						   data-size="large"
						   data-action="like" 
						   data-show-faces="false" 
						   data-share="false">
					  </div>
				  </div>
				  <p style="font-size: smaller; text-align: center; padding-top: 5px;"><a onclick="changeToPost();">Ya di "Me Gusta", prefiero hacer Check-in</a></p>
		      </div>

			  <div id="fbpost-div" style="display: none;">
			      <p class="fnbt-name-text grey-text">Comprueba tu visita con un Check-in.</p>
				  <div class="like-div" style="overflow: hidden;">
			  			<a class="waves-effect waves-light btn fb-btn btn-centered" style=" background-color: #405A9F; font-size: 3vw;" onclick="postclick();">
				  			<i class="mdi mdi-facebook left" style=" font-size: 4vw !important;"></i>Check-in con Facebook
				  		</a>
				  </div>
		      </div>
	    </footer>

	</div>
	<script>
			var browserAgent = navigator.userAgent;
			console.log(browserAgent);
			if (browserAgent.indexOf("iPhone") > -1){
				console.log("Changed class");
			}
			
			function changeToPost(){
				$("#fbpost-div").show();
				$("#fblike-div").hide();
			}
	</script>
    </body>
  </html>