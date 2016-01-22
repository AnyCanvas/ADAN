	<script>
				<?php
			    	   echo '	ga("send", "event", "'. $_SESSION['fnbt']['id'] .'" , "step 3", "error fanbot suspended");';
				?>
	</script>
   <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div class="red accent-2" style=" height: 75%; background-image: url(./images/error3.png); background-repeat: no-repeat; background-position: center bottom; background-size: auto 60%;">
		</div>
	    <footer style="height: 25%;" class="red accent-2">
		      <p class="error-text white-text">Esta Fanbot está suspendida,<br>puedes probar Fanbot en otro negocio.<p>
			  <a class="waves-effect waves-light btn white black-text btn-centered">BUSCAR OTROS NEGOCIOS</a>
	    </footer>

	</div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>