	<script>
		<?php 
			echo '	ga("send", "event", "'. $_SESSION['fnbt']['id'] .'" , "step 3", "error fanbot disconnected");';
		?>
	</script>

    <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div class="red accent-2" style=" height: 75%; background-image: url(./images/error2.png); background-repeat: no-repeat; background-position: center bottom; background-size: auto 60%;">
		</div>
	    <footer style="height: 25%;" class="red accent-2">
		      <p class="error-text white-text">Esta Fanbot está desconectada,<br>puedes probar Fanbot en otro negocio.<p>
			  <a class="waves-effect waves-light btn white black-text btn-centered">BUSCAR OTROS NEGOCIOS</a>
	    </footer>

	</div>
    </body>
  </html>