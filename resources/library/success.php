<!DOCTYPE html>
<html>
<head>
	<title>¡Bravo!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script src="js/common.js"></script>
  	<script>
	  	ga("send", "event", "<?php echo $_SESSION['id']; ?>", "step 3", "<?php echo $_SESSION['config']['type'];?> success");
  	    ga("send", "event", "<?php echo $_SESSION['id']; ?>", "step 3", "success");
  	</script>
</head>

<body <?php if($_SESSION['id'] == "PF-B1-LTM-0001"){ echo 'style="background-color: #004485;"'; }?>>
	<div class="container-fluid">

	 <?php if($_SESSION['id'] != "PF-B1-LTM-0001"){ ?>
	  <div class="center-block" style="width: 220px; height: 415px; padding-top: 10%">
	    	<img class="img-responsive" alt="Fanbot" src="media/images/done.png">
	    	<div id="actionNumber">
		    	<img src="media/images/hand.png" 
		    	     alt="hand" 
		    	     width="auto" 
		    	     height="25">
		    <?php timeStamp(); ?>
		   	</div>
	  </div>


        <div id="conoceMas" class="fb_logo-row row bottom">
                <a href="http://fanbot.me">
                <div class="col-xs-12">
				<span class="glyphicon glyphicon glyphicon-share-alt" 
				      style="padding-right: 5px;">
				</span>
				CONOCE FANBOT
                </div>
                </a>
        </div>
	  <?php } else {?>
	  <div class="center-block" style="width: 220px; height: 415px; padding-top: 10%">
	    	<img class="img-responsive" alt="Fanbot" src="media/clients/centinela/done.jpg">
	  </div>
	  <?php }?>
	</div>
</body>
</html>