 <title>Haz Checkin</title>

   <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div id="upper-div" style="height: 75%;" class="blue">
		<div class="div-wrapper full" style="background-color: <?php echo $_SESSION['fnbt']['config']["bgcolor"] ?>;">

			<img class="center-img fbpage-img" src="https://graph.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>/picture?type=large" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">

		</div>
		</div>
	    <footer style="height: 25%;">
		      <p class="fnbt-name-text grey-text">Comprueba tu visita con un Check-in<br>o introduce el código de tu recibo.<p>
			  <div class="like-div" style="overflow: hidden;">
		  			<a class="waves-effect waves-light btn fb-btn btn-centered" style=" background-color: #405A9F; font-size: 3vw;" onclick="postclick();">
			  			<i class="mdi mdi-facebook left" style=" font-size: 4vw !important;"></i>Check-in
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