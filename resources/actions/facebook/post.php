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
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script src="../../../js/common.js"></script>
	<script>
			ga('send', 'event', 'action', 'facebook', 'post', 'entered');
	</script>
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

			postclick = function () {
/*			if(navigator.standalone){
				    new_url = 'https://www.facebook.com/dialog/feed?'+
				                'app_id=<?php echo $config["fbApp"]["appId"] ?>'+
				                '&display=popup'+
				                '&caption=Fanbot Me me me '+
				             //   '&picture='+fbPicture+
				             //   '&description='+fbDescription+
				                '&link=https://www.facebook.com/<?php echo $_SESSION['config']['link']; ?>'
				                '&redirect_uri=http://45.55.247.168/action.php/#post_id';
				
				        window.open(new_url,'_self');
			  } else {  */
						FB.ui({
//						  method: 'share',
//						  href: 'https://www.facebook.com/<?php echo $_SESSION['config']['link']; ?>',
						  method: 'feed',
						  link: 'https://www.facebook.com/<?php echo $_SESSION['config']['link']; ?>',
						  caption: 'An example caption',
						  description: 'Fanbot es la verga',
						}, function(response){
				            if (response) {
									  ga('send', 'event', 'action', 'facebook', 'post', 'post successful');
									  window.location="<?php echo $loginUrl;?>";			
				                } else {
									  ga('send', 'event', 'action', 'facebook', 'post', 'post unsuccessful');
				                    }
						});
//			  }  


			}	
		<?php
			if(isset($_GET["post"])){
				header("location: ". $loginUrl);			    
		    } ?>
  
</script>

		
	<div class ="container-fluid">
		
		<!-- Informative image Columns-->
		  <div class="brand-row row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
		    	<img class="img-responsive" alt="Name help image" src="media/clients/
			<?php 
						echo $_SESSION['config']['image']; 
			?>">
		    </div>
		    <div class="col-xs-1" ></div>
		  </div>

		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
				<a id="post-btn" class="btn btn-block btn-lg btn-social btn-facebook" onclick="postclick();">
	    			<i class="fa fa-facebook-official"></i> <span class="text-center" style="font-size: 1.1em;" >Continuar</span>
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
