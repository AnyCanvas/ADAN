 <title>Haz Checkin</title>

   <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div id="loader" style="display: block; width: 100%; height: 100%; z-index: 9; position: absolute; background-color: rgba(0, 0, 0, 0.51);">
			<div class="wrapper vertical-center">
				<div class="cssload-loader btn-centered" style="z-index: 10; top: 45vh; margin: auto;"></div>
			</div>
		</div>
		<div id="upper-div" style="height: 75%;" class="blue">
		<div class="div-wrapper full" style="background-color: <?php echo $_SESSION['fnbt']['config']["bgcolor"] ?>;">

			<img class="center-img fbpage-img" src="https://graph.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>/picture?type=large" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">

		</div>
		</div>
	    <footer style="height: 25%;">
		      <p class="fnbt-name-text grey-text">Comprueba tu visita con un Check-in<br>o introduce el código de tu recibo.<p>
			  <div class="like-div" style="overflow: hidden;">
					<a id="post-btn" class="btn btn-block btn-xs btn-social btn-facebook" onclick="postclick();" style="padding-left: 20px;">
		    			<i class="fa fa-facebook-official"></i> <span class="text-center" >Check-in</span>
		  			</a>

			  </div>
	    </footer>

	</div>
	<script>
			var browserAgent = navigator.userAgent;
			console.log(browserAgent);
			if (browserAgent.indexOf("iPhone") > -1){
				console.log("Changed class");
				$( "#upper-div" ).addClass( "iphone-fix" );

			}
	</script>
    </body>
  </html>