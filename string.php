<html>
<head>
	<title>Inicia sesion en Facebook para continuar</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>	
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=1645168355707000";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

<script>
setTimeout(function(){
		FB.getLoginStatus(function(response) {
		  if (response.status === 'connected') {
		   alert('conectado');
		    var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;
		  } else if (response.status === 'not_authorized') {
		   alert('conectado');
		  } else {
		   alert('desconectado');
		  }
		 });
	},1000);


</script>
</body>