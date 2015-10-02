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
	$(document).ready ( function(){
	FB.ui(
	 {
	  method: 'share',
	  href: 'https://developers.facebook.com/docs/'
	}, function(response){});
});​
</script>
</body>