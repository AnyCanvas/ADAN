<!DOCTYPE html>
<html lang="es">
	<title>!Upss¡</title>
	<?php require_once( "resources/html/header.php" ); ?>

	<script>
		ga("send", "event", "<?php echo $_SESSION['fnbt']['id'] ?>" , "step 3", "error fanbot disconnected");
	</script>



 
    <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div id="upper-div" class="red accent-2" style=" height: 75%; background-image: url(./images/error.png); background-repeat: no-repeat; background-position: center bottom; background-size: auto 60%; background-color: #ee5559;">
		</div>
	    <footer style="height: 25%; background-color: #ee5559;">
		      <p class="error-text white-text">Esa palabra no coincide<br>con la de la etiqueta azul.<p>
			  <a href="index.php" class="waves-effect waves-light btn white black-text btn-centered">INTENTAR DE NUEVO</a>
	    </footer>

	</div>
    </body>
</html>