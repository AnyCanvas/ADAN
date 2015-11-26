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
  	<script src="../../js/common.js"></script>
</head>

<script>
			<?php switch ($_SESSION['error']){
				case 0:
		    	   echo '	ga("send", "event", .'. $_SESSION['id'] .' , "final", "error1", 1);';
				   break;
				case 1:
		    	   echo '	ga("send", "event", .'. $_SESSION['id'] .' , "final", "error2", 1);';
					break;
				case 2:
		    	   echo '	ga("send", "event", '.$_SESSION['id'] .' , "facebook", "error3", 1);';
					break;

				}
			?>
</script>
<body>
	<div class="container-fluid">

	<!-- Fanbot logo columns-->
	  <div class="row top-row">
	    <div class="col-xs-12" >
	    	<img class="img-responsive" alt="Fanbot" src="../../media/images/<?php switch ($_SESSION['error']){
				case 0:
		    	   echo 'upss.png';
				   break;
				case 1:
					echo 'disconnected.png';
					break;
				case 2:
					echo 'suspended.png';
					break;

				}
			?>">
	    </div>
	  </div>

	</div>
</body>
</html>