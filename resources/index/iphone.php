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
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
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
	<div class ="container-fluid">
		
		<!-- Informative image Columns-->
		  <div class="brand-row row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
		    	<img class="img-responsive" alt="Name help image" src="media/images/index_iphone.png">
		    </div>
		    <div class="col-xs-1" ></div>
		  </div>

		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
				<a class="btn btn-block btn-lg btn-social btn-facebook" href="fb://profile/1550316151894751">
	    			<i class="fa fa-facebook-official"></i> <span class="text-center" style="font-size: 1.1em;" >Continuar</span>
	  			</a>
		    </div>
		    <div class="col-xs-2" ></div>
		</div>	

	</div>
</body>
</html>