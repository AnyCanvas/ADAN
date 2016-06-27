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
			document.location.href = 'http://soyfanbot.com/foot/#/codigo?token=' + accessToken;	
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
   
.controller('codigoCtrl', function($scope, $location, localStorageService) {
	console.log($location.search().token);
	// To add to local storage
	  localStorageService.set('localStorageKey','Add this!');
	  // Read that value back
	  var value = localStorageService.get('localStorageKey');
	  // To remove a local storage
	  localStorageService.remove('localStorageKey');
	  // Removes all local storage
	  localStorageService.clearAll();
	  // You can also play with cookies the same way
	  localStorageService.cookie.set('localStorageKey','I am a cookie value now');
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
 