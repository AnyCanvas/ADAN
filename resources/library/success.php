<!DOCTYPE html>
<html>
	<title>¡Bravo!</title>
	<?php require_once( "resources/html/header.php" ); ?>
  	<script>
	  	ga("send", "event", "<?php echo $_SESSION['fnbt']['id']; ?>", "step 3", "<?php echo $_SESSION['fnbt']['config']['type'];?> success");
  	</script>

    <body>

	<div class="container-fluid blue" style="height: 100%; width: 100%">
		<div id="upper-div" style="height: 75%;" class="blue">
		<div class="div-wrapper full">
			<img class="center-img success-img" src="images/success.png">
		</div>
		</div>
	    <footer style="height: 25%; padding-top: 17.5vh;" class="blue">
		    <div class="btn-full-div">
			  <a class="waves-effect waves-light btn white black-text btn-full teal accent-2" href="http://fanbot.me/"><i class="material-icons left">arrow_forward</i>CONOCE FANBOT</a>
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