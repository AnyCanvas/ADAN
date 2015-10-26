<!DOCTYPE html>
<html>
<head>
	<title>!Upss¡</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css">
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
	    	<img class="img-responsive" alt="Fanbot" src="../../media/images/upss.png">
	    </div>
	    <div class="col-xs-3" ></div>
	  </div>

	<div class="clearfix visible-xs-block"></div>

	<!-- Text columns-->
		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
			<?php switch ($_SESSION['error']){
				case 0:
		    	   echo '<p class="text-center text-nowrap" style="color: white; font-size: 1.5em; ">!Upss¡, Esta Fanbot nos<br>dice  que no tienes <br>los permisos de Facebook.</p>';
				   break;
				case 1:
					echo '<p class="text-center text-nowrap" style="color: white; font-size: 1.5em; ">!Upss¡, Esta Fanbot nos<br>dice  que ya te dio un<br>premio.</p>';
					break;
				case 2:
					echo '<p class="text-center text-nowrap" style="color: white; font-size: 1.5em; ">!Upss¡, Esta Fanbot esta<br>suspendida.</p>';
					break;

				}
			?>
				
		    	
		    </div>
		    <div class="col-xs-1" ></div>
		</div>


	<div class="clearfix visible-xs-block"></div>




	</div>
</body>
</html>