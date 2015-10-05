<html>
<head>
	<title>Inicia sesion en Facebook para continuar</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>	
	<div id="fb-root"></div>
		<script>
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '1645168355707000',
			      xfbml      : true,
			      version    : 'v2.4'
			    });

				FB.getLoginStatus(function(response) {
				  if (response.status === 'connected') {
				   alert('conectado');
				    var uid = response.authResponse.userID;
				    var accessToken = response.authResponse.accessToken;
				  } else if (response.status === 'not_authorized') {
				   alert('conectado');
				  } else {
				  	var browserAgent = navigator.userAgent
				   if (browserAgent.indexOf("Android") > -1){
					   alert('Android');					   
				   } else if (browserAgent.indexOf("iPhone") > -1){
				   		alert("iPhone");
				  }
				 });
			  };
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

<script>

</script>
</body>