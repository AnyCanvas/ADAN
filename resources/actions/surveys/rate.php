<title>Dale like</title>
<meta charset="UTF-8"/>
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/star-rating.js" type="text/javascript"></script>
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
				  		<input id="rating-input" type="number" value="3" />
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
			
			function changePage(){
				window.location="/final.php?a="+ $('#rating-input').val()
			}
	    $('#rating-input').on('rating.change', function(event, value, caption) {
			$('#rating-input').rating('update', value);
	        $('#rating-input').rating('refresh', {disabled: true});
	        alert(value);	        
        }).then(function(){
            console.log(value);	        
        });
			
			
    jQuery(document).ready(function () {

		$('#loader').hide();
		console.log("finished rendering plugins");

        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'sm',
              showClear: false,
              showCaption: false,
              overEnabled: false
           });
    });
	</script>
    </body>
  </html>