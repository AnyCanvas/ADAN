<title>Dale like</title>
<meta charset="UTF-8"/>
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/rating.min.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/rating.min.js" type="text/javascript"></script>
    <body>

	<div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
		<div id="loader" style="display: block; width: 100%; height: 100%; z-index: 9; position: absolute; background-color: rgba(0, 0, 0, 0.51);">
			<div class="wrapper vertical-center">
				<div class="cssload-loader btn-centered" style="z-index: 10; top: 45vh; margin: auto;"></div>
			</div>
		</div>
		<div id="upper-div" style="height: 65%; position: relative;" class="blue">
		<div class="div-wrapper full" style="background-color: <?php echo $_SESSION['fnbt']['config']["bgcolor"] ?>;">

		<img class="center-img fbpage-img" src="https://graph.facebook.com/<?php echo $_SESSION['fnbt']['config']['link'];?>/picture?type=large" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
		</div>
		</div>
	    <footer style="height: 35%;">
			  <div id="fblike-div">
			      <p class="fnbt-name-text grey-text">Contesta para jugar<br><?php echo($_SESSION['q']); ?></p>
				  <div class="like-div" style="overflow: hidden;">
				  		<div id="el"></div>
				  </div>
		      </div>
	    </footer>

	</div>
	<script>
			var browserAgent = navigator.userAgent;
			console.log(browserAgent);
			if (browserAgent.indexOf("iPhone") > -1){
				console.log("Changed class");
				$( "#upper-div" ).addClass( "iphone-fix" );
			}
						
			
    jQuery(document).ready(function () {

		$('#loader').hide();
		console.log("finished rendering plugins");

		// target element
		var el = document.querySelector('#el');
		
		// current rating, or initial rating
		var currentRating = 0;
		
		// max rating, i.e. number of stars you want
		var maxRating= 5;
		
		// callback to run after setting the rating
		var callback = function(rating) { alert(rating); };
		
		// rating instance
		var myRating = rating(el, currentRating, maxRating, callback);
    });
	</script>
    </body>
  </html>