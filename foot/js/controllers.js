angular.module('app.controllers', [])
  
.controller('inicioDeSesionCtrl', function($scope) {

		var finished_rendering = function() {
			console.log("finished rendering plugins");
		}
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1645165719040597',
		      xfbml      : true,
		      version    : 'v2.4'
		    });
		    
		FB.Event.subscribe('xfbml.render', finished_rendering);

		var referrer = document.referrer;	
		var browserAgent = navigator.userAgent
		console.log(referrer);	
		console.log(browserAgent);
		FB.getLoginStatus(function(response) {
		  if (response.status === 'connected') {
		    console.log('logged and authorized');
		    var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;
		    var userID = response.authResponse.userID;		    
			document.location.href = 'http://soyfanbot.com/foot/#/codigo?token=' + accessToken + "&id=" + userID;	
		  } else if (response.status === 'not_authorized') {
		    console.log('logged');
		  }	else {
		    console.log('not logged');
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
		
})
   
.controller('codigoCtrl', function($scope, $location, chat) {
	console.log($location.search().token);

	var token = $location.search().token
	var id = $location.search().id
	sessionStorage.token = token;

    var msg = {
        'user': id,
        'text': token,
        'time': moment().format('hh:mm a')
    };
	var conn = chat.connect(JSON.stringify(msg));	

})
   
.controller('likeCtrl', function($scope) {

})
   
.controller('marcadorCtrl', function($scope) {

})
   
.controller('ganadorCtrl', function($scope) {

})
   
.controller('perdedorCtrl', function($scope) {

})
   
.controller('errorCtrl', function($scope) {

})
 