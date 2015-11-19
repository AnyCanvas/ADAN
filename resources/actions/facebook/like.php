
<html>
<head>

	<title>Inicia sesion en Facebook para continuar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script src="../../../js/common.js"></script>
  	<style type="text/css">
		html{
		    height: 100%;
		}
		body{
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fae300+0,ad9c00+100 */
			background:
			<?php 
						echo $_SESSION['config']['bgcolor'];
			?>
					}
  	</style>
  	
  	<script type="text/javascript">
	ga('send', 'event', 'action', 'facebook', 'like', 'load page');
	  	
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
//		ga('send', 'event', 'action', 'facebook', 'like', 'page liked');
		window.location="<?php echo $loginUrl;?>";
    });
    FB.Event.subscribe('edge.remove', function(targetUrl) {
//		ga('send', 'event', 'action', 'facebook', 'like', 'page unliked');
    });
  };
  
</script>

		
	<div class ="container-fluid">
		
		<!-- Informative image Columns-->
		  <div class="brand-row row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
		    	<img class="img-responsive action_img" alt="Name help image" src="media/clients/
			<?php 
						echo $_SESSION['config']['image']; 
			?>">
		    </div>
		    <div class="col-xs-2" ></div>
		  </div>


			<?php 
					if ($_SESSION['id'] == "FB-B1-SCM-00103"){	
						echo '		<div class="clearfix visible-xs-block"></div>

		  <div class=" row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
		    	<img class="img-responsive action_img" alt="Name help image" src="media/clients/text1.png">
		    </div>
		    <div class="col-xs-1" ></div>
		  </div>
		  		<div class="clearfix visible-xs-block"></div>'; 
					
					}
			?>

		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">

			    <div class="col-xs-2" ></div>
			    <div class="col-xs-8 like_box">

					<div class="col-xs-5" >
					    <div class="center-block" >
							<img id="fb_img" src="https://graph.facebook.com/<?php echo $_SESSION['config']['link'];?>/picture" class="img-responsive img-thumbnail center-block" alt="Cinque Terre">
						</div>
					</div>
		
					<div class="col-xs-7" style="overflow: hidden; white-space: nowrap;" >
						<p><?php getFbPageName($_SESSION['config']['link']);?><p>
						<div id="fblike center-block">
							<div class="fb-like center-block" data-action="like" data-href="https://www.facebook.com/<?php echo $_SESSION['config']['link'];?>" data-layout="button" data-show-faces="false" data-share="false" >							    
						</div>
	
					</div>

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

			<?php 
					if ($_SESSION['id'] == "FB-B1-SCM-00103"){	
						echo '		<div class="clearfix visible-xs-block"></div>

		  <div class=" row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
		    	<img class="img-responsive action_img" alt="Name help image" src="media/clients/text2.png">
		    </div>
		    <div class="col-xs-2" ></div>
		  </div>
		  		<div class="clearfix visible-xs-block"></div>'; 
					
					}
			?>

	</body>
</html>
