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
		    	   echo '	ga("send", "event", "'. $_SESSION['id'] .'" , "step 3", "error already activated");';
				   break;
				case 1:
		    	   echo '	ga("send", "event", "'. $_SESSION['id'] .'" , "step 3", "error fanbot disconnected");';
					break;
				case 2:
		    	   echo '	ga("send", "event", "'.$_SESSION['id'] .'" , "step 3", "error fanbot suspended");';
					break;

				}
			?>
</script>
<body <?php if($_SESSION['id'] == "PF-B1-LTM-0001"){ echo 'style="background-color: black;"'; }?>>
	<div class="container-fluid">

	 <?php if($_SESSION['id'] != "PF-B1-LTM-0001"){ ?>

	<!-- Fanbot logo columns-->
	  <div class="center-block" style="width: 220px; height: 415px; padding-top: 50%">
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

	  <?php } else {?>
	  <div class="center-block" style="width: 220px; height: 415px; padding-top: 50%">
	    <img class="img-responsive" alt="Fanbot" src="media/clients/centinela/upss.jpg">
	  </div>
	  <?php }?>

	</div>
</body>
</html>