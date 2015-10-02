<html>
<head>
	<title>Inicia sesion en Facebook para continuar</title>
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

FB.ui(
 {
  method: 'share',
  href: 'https://developers.facebook.com/docs/'
}, function(response){});
</script> 
</head>
<body>	

</body>