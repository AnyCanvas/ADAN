	<script>
		<?php
			 echo '	ga("send", "event", "'. $_SESSION['fnbt']['id'] .'" , "step 3", "error already activated");';
		?>

	</script>
  
   <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div class="red accent-2" style=" height: 75%; background-image: url(./images/error1.png); background-repeat: no-repeat; background-position: center bottom; background-size: auto 60%;">
		</div>
	    <footer style="height: 25%;" class="red accent-2">
		    <p class="error-text white-text">Esta Fanbot nos dice que ya te dispensó.<p>
		    <div class="btn-full-div">
			  <a class="waves-effect waves-light btn white black-text btn-full teal accent-2"><i class="material-icons left">arrow_forward</i>CONOCE FANBOT</a>
		    </div>
	    </footer>

	</div>
    </body>
  </html>