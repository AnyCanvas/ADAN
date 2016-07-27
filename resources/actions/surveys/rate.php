<title>Dale like</title>
<meta charset="UTF-8"/>
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/star-rating.js" type="text/javascript"></script>
    <body>
	<div id="fb-root"></div>
		<script>
	    postclick = function () {
			window.location = "node.php";										
		}						
		var finished_rendering = function() {
			$('#loader').hide();
			console.log("finished rendering plugins");
		}
			
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo $config["fbApp"]["appId"] ?>',
		      xfbml      : true,
		      version    : 'v2.6'
		    });

				FB.Event.subscribe('xfbml.render', finished_rendering);

				FB.Event.subscribe('edge.create', function(targetUrl) {
					ga('send', 'event', 'action', 'facebook', 'like', 1);
					<?php if ($_SESSION['fnbt']['name'] == 'futy'){ ?> 
					window.location="/foot";
					<?php }else { ?>
					window.location="/final.php";
					<?php } ?>

				});
				FB.Event.subscribe('edge.remove', function(targetUrl) {
					ga('send', 'event', 'action', 'facebook', 'like', 0);
				});
		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/es_LA/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
			

		</script>

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
			      <p class="fnbt-name-text grey-text">Contesta para jugar<br>¿Como calificarías el servicio?</p>
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
			
			function changeToPost(){
				$("#fbpost-div").show();
				$("#fblike-div").hide();
			}
			
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'sm',
              showClear: false,
              showCaption: false
           });
                   
        $('#rating-input').on('rating.change', function() {
            console.log($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
	</script>
    </body>
  </html>