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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-65249445-1', 'auto');
	  ga('send', 'pageview');
	
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
		</script>
		
<script>

	postclick = function () {
		FB.ui({
		  method: 'share',
		  href: 'https://www.facebook.com/<?php echo $_SESSION['config']['link']; ?>',
		  display: 'async',
		}, function(response){
            if (response && response.post_id) {
                      console.log('Post was published.');
					  window.location="<?php echo $loginUrl;?>";			
                } else {
					  window.location="final.php";
                    }
		});
	}	
  
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
