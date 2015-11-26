
<!DOCTYPE html>
<html>
<head>
	<title>¡Bravo!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script src="js/common.js"></script>
  	<script>
	  	ga("send", "event", "action", "final", "success", 1);
  	</script>
</head>

<body>
	<div class="container-fluid">

	<!-- Fanbot logo columns-->
	  <div class="row top-row">
	    <div class="col-xs-3" ></div>
	    <div class="col-xs-6" >
	    	<img class="img-responsive" alt="Fanbot" src="media/images/done.png">
	    </div>
	    <div class="col-xs-3" ></div>
	  </div>

	<div class="clearfix visible-xs-block"></div>

	<!-- Like Count columns-->
		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
		    	<p class="text-center text-nowrap" style="color: white; font-size: 1.5em; ">Action Id: <?php timeStamp(); ?></p>
		    </div>
		    <div class="col-xs-1" ></div>
		</div>

	<div class="clearfix visible-xs-block"></div>

	<!-- Text columns-->
		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
		    	<p class="text-center text-nowrap" style="color: white; font-size: 1.5em; ">Algo asombroso <br> acaba de pasar.</p>
		    </div>
		    <div class="col-xs-1" ></div>
		</div>
	</div>
</body>
</html>