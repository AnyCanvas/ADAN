<!DOCTYPE html>
<html>
<head>
	<title>¡Bravo!</title>
	<?php require_once( "resources/html/header.php" ); ?>
</head>

<body <?php if($_SESSION['fnbt']['id'] == "PF-B1-LTM-0001"){ echo 'style="background-color: #004485;"'; }?>>

  	<script>
	  	ga("send", "event", "<?php echo $_SESSION['fnbt']['id']; ?>", "step 3", "<?php echo $_SESSION['fnbt']['config']['type'];?> success");
  	    ga("send", "event", "<?php echo $_SESSION['fnbt']['id']; ?>", "step 3", "success");
  	</script>
	<div class="container-fluid">

	 <?php if($_SESSION['fnbt']['id'] != "PF-B1-LTM-0001"){ ?>
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