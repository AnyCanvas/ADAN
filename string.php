<html>
<head>
	<title>Inicia sesion en Facebook para continuar</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1645168355707000',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> 
</head>
<body>	
<script>
	setTimeout(function(){
		FB.getLoginStatus(function(response) {
		  if (response.status === 'connected') {
		    // the user is logged in and has authenticated your
		    // app, and response.authResponse supplies
		    // the user's ID, a valid access token, a signed
		    // request, and the time the access token 
		    // and signed request each expire
		    var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;
		  } else if (response.status === 'not_authorized') {
		    // the user is logged in to Facebook, 
		    // but has not authenticated your app
		  } else {
		    // the user isn't logged in to Facebook.
		  }
		 });
	},2000);

</script>
</body>