<?php
	session_start();
	$_SESSION['pageNumber'] = 1;
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a Fanbot</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-65249445-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
</head>

<body>
	<div class="container-fluid">

	<!-- Fanbot logo columns-->
	  <div class="row top-row">
	    <div class="col-xs-3" ></div>
	    <div class="col-xs-6" >
	    	<img class="img-responsive" alt="Fanbot" src="media/images/index_iphone.png">
	    </div>
	    <div class="col-xs-3" ></div>
	  </div>

	<div class="clearfix visible-xs-block"></div>


	<!-- Text columns-->
		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
				<?php
						if(isset($_SESSION['nameErr'])){
						if ($_SESSION['nameErr']){
							$_SESSION['nameErr'] = FALSE;
							echo ('<div class="alert alert-danger text-center text-nowrap" role="alert">La Fanbot que buscas no existe.</div>');
				}
				}
				?>
		    	<p class="text-center text-nowrap" style="color: white; font-size: 1.5em; ">Escribe el nombre de<br>la Fanbot</p>
		    </div>
		    <div class="col-xs-1" ></div>
		</div>

	<div class="clearfix visible-xs-block"></div>

	<!-- Input and button to next page columns-->
	  <div class="row mid-row">
	    <div class="col-xs-1" ></div>
	    <div class="col-xs-10" >

			<form class="form" action="node.php" method="get">
				<div class="input-group square-box">
	      			<input type="text" class="form-control input-lg text-center lead text-lowercase inline-text square-box" name="name">
	      			<span class="input-group-btn">
	        			<button class="btn btn-lg next-btn square-box" type="submit">
	        				<span class="glyphicon glyphicon-chevron-right"></span>
	        			</button>
					</span>
	    		</div>
			</form>

	    </div>
	    	<div class="col-xs-1" ></div>
	  </div>


	<!-- Informative image Columns-->
	  <div class="row">
	    <div class="col-xs-3" ></div>
	    <div class="col-xs-8" >
	    	<img class="img-responsive" alt="Name help image" src="media/images/serial.png">
	    </div>
	    <div class="col-xs-1" ></div>
	  </div>

	</div>
</body>
</html>