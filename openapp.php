  <!DOCTYPE html>
  <html lang="en">
      <!--Import Google Icon Font-->
      <meta charset="utf-8"> 
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
	  <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
	  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>

	<script>
		var browserAgent = navigator.userAgent
		console.log(browserAgent);
				if (browserAgent.indexOf("iPhone") > -1){
					console.log("iPhone detected");
					$("#app-btn").attr("href", "http://www.w3schools.com/jquery");
					$("#app-btn").attr('href', 'fb://profile/1550316151894751');
				} else if (browserAgent.indexOf("Android") > -1){
					if (browserAgent.indexOf("Android 5") > -1 || browserAgent.indexOf("Android 6") > -1){
						console.log("Android lollipop detected");
						$("#app-btn").attr('href', 'fb://page/1550316151894751');
					} else if (browserAgent.indexOf("Android 4.4") > -1){
						console.log("Android Kitkat detected");
					} else {
						console.log("Old Android detected");
				   	}
			  	} else {
					console.log("Model not detected");
			  	}
			
	</script>
    <body>

	<div class="container-fluid" style="height: 100%; width: 100%">
		<div style="height: 75%;" class="grey lighten-3">
		<div class="div-wrapper full jugar-img">
		</div>
		</div>
	    <footer style="height: 25%;">
		      <p class="fnbt-name-text grey-text">&nbsp;<p>
			  <a id="app-btn" class="waves-effect waves-light fb-btn btn btn-centered " href="http://www.w3schools.com"  style=" background-color: #405A9F; font-size: 3vw;"><i class="socicon-facebook left" style=" font-size: 4vw !important;"></i>Abrir Facebook</a>
	    </footer>

	</div>
    </body>
  </html>