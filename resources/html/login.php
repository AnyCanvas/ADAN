<title>Inicia sesión</title>

	
   <body>

	<div id="fb-root"></div>
	<script>


		ga('send', 'event', "step 1", 'login page');	

		
		postclick = function () {
			window.location = "<?php echo $loginUrl;?>";										
		}	
	</script>

	<div class="container-fluid">		
		<div id="upper-div" style="height: 45vh; width: 100vw;">
		<div class="div-wrapper full login-img" style="background-image: url(./images/login.png); background-repeat: no-repeat; background-position: center bottom; background-size: 20% auto;">
		</div>
		</div>
	    <footer style="height: 55vh; width: 100vw; padding-top: 1vh; background-color: white; !important;">
			  <a class="waves-effect waves-light btn fb-btn btn-centered" style=" background-color: #405A9F; font-size: 3vw;" onclick="postclick();"><i class="mdi mdi-facebook left" style=" font-size: 4vw !important;"></i>Continuar con Facebook</a>
			  <p style="font-size: x-small; text-align: center; padding-top: 5px;">Al continuar estarás aceptando el <a href="http://fanbot.me/aviso-de-privacidad/" target="_blank">Aviso de Privacidad</a></p>	    
	   </footer>


	</div>
    </body>
  </html>