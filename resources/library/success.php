
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
	  	ga("send", "event", "<?php echo $_SESSION['id']; ?>", "step 3", "<?php echo $_SESSION['config']['type'];?> success");
  	</script>
</head>

<body>
	<div class="container-fluid">

	  <div class="center-block" style="width: 220px; height: 415px; padding-top: 50%">
	    	<img class="img-responsive" alt="Fanbot" src="../../media/images/done.png">
	    	<div id="actionNumber"><img src="../../media/images/hand.png" alt="hand" width="auto" height="25"><?php timeStamp(); ?></div>
	  </div>

	</div>
</body>
</html>