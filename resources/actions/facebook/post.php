<html>
	<title>Inicia sesion en Facebook para continuar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<style>
		div.container { background: transparent; };
		div.lockframe { z-index: -2; };
	</style>
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
  	<script type="text/javascript">
			  	/**
		 * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
		 */
		$(function() {
		    function reposition() {
		        var modal = $(this),
		            dialog = modal.find('.modal-dialog');
		        modal.css('display', 'block');
		        
		        // Dividing by two centers the modal exactly, but dividing by three 
		        // or four works better for larger screens.
		        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
		    }
		    // Reposition when a modal is shown
		    $('.modal').on('show.bs.modal', reposition);
		    // Reposition when the window is resized
		    $(window).on('resize', function() {
		        $('.modal:visible').each(reposition);
		    });
		});		

    <?php
    if (isset($_GET["code"])){?>
     
     $(window).load(function(){$('#likePopup').modal('show');});
    <?php } ?>
	  	
  	</script>
  	
</head>

<body>
	
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=<?php echo $config["fbApp"]["appId"] ?>";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		
<script>
  window.fbAsyncInit = function() {
    FB.Event.subscribe('edge.create', function(targetUrl) {
	  $("body").find("*").attr("disabled", "disabled");
	   console.log("out");    
	  window.location="final.php";
    });
    FB.Event.subscribe('edge.remove', function(targetUrl) {
      console.log("unLike");
    });

  };
  
</script>

		
	<div class ="container-fluid">

		  <div class="brand-row row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
		    	<img class="img-responsive" alt="Name help image" src="media/clients/
			<?php 
						echo $_SESSION['config']['image']; 
			?>">
		    </div>
		    <div class="col-xs-2" ></div>
		  </div>


		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
			    <input type="text" class="form-control" placeholder="Campo de texto">
			    <div class="container" style="background: transparent;">
					<div style="z-index: -2;" class="fb-page lockframe" style = "padding: 0px;" data-href="https://www.facebook.com/<?php echo $_SESSION['config']['link']; ?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/<?php echo $_SESSION['fbPage']; ?>"><a href="https://www.facebook.com/<?php echo $_SESSION['fbPage']; ?>">Fanbot</a></blockquote></div></div>
			    </div>
		    </div>

		    </div>
		    <div class="col-xs-1" ></div>
		</div>	
		
		
		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
				<a class="btn btn-block btn-lg btn-social btn-facebook" href="<?php echo $loginUrl;?> ">
	    			<i class="fa fa-facebook-official"></i> <span class="text-center" style="font-size: 1.1em;" >Check in</span>
	  			</a>
		    </div>
		    <div class="col-xs-2" ></div>
		</div>	

		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10 text-center leadinline-text" >
				<span style="font-size: x-small; color: white;" >Al continuar estarás aceptando los términos y condiciones.</span>
		    </div>
		    <div class="col-xs-1" ></div>
	</div>
	</body>
</html>
