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
	<style type="text/css">
		#fblike {
		    transform: scale(2);
		    -webkit-transform: scale(2);
		    -moz-transform: scale(2);
		    -ms-transform: scale(2);
		    width: 73px;
		    overflow: hidden;
		    margin: 10px auto;
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
		  window.fbAsyncInit = function() {
		    FB.Event.subscribe('edge.create', function(targetUrl) {
			  $("body").find("*").attr("disabled", "disabled");
		        console.log('Page like.');
				window.location="<?php echo $loginUrl;?>";
		    });
		    FB.Event.subscribe('edge.remove', function(targetUrl) {
		      console.log("unLike");
		    });
		
		  };
		
		</script>

		
	<div class ="container-fluid">
		
		<!-- Informative image Columns-->
		  <div class="brand-row row">
		    <div class="col-xs-2" ></div>
		    <div class="col-xs-8" >
	    	<img class="img-responsive" alt="Fanbot" src="media/clients//fanbot.png">
		    </div>
		    <div class="col-xs-2" ></div>
		  </div>

		<div class="clearfix visible-xs-block"></div>

		<div class="row mid-row">
		    <div class="col-xs-1" ></div>
		    <div class="col-xs-10" >
			<div id="fblike">
			    <div class="fb-like" data-action="like" data-href"https://www.facebook.com/fanbotme" data-layout="button" data-show-faces="false" data-share="false" ></div>
			</div>
		    </div>
		    <div class="col-xs-1" ></div>
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


