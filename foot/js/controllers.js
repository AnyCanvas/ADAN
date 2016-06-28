angular.module('app.controllers', [])
  
.controller('inicioDeSesionCtrl', function($scope, ws) {

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
   
.controller('codigoCtrl', function($scope, $window, $location, $ionicModal, ws) {

	var token = $location.search().token
	var id = $location.search().id

	console.log($location.search().token);
	sessionStorage.token = token;
	sessionStorage.id = id;
	
	console.log($location.search().id);

    var msg = {
        'type': 'fbInfo',
        'text': token,
        'time': moment().format('hh:mm a')
    };
    
    $scope.fromFactory = ws.send(msg);
    $scope.chatId = sessionStorage.chatId;;

	$scope.$watch(function () {
	  return $window.sessionStorage.getItem('chatId');
	}, function (value) {
	  $scope.chatId = value;
	});

})
   
.controller('likeCtrl', function($scope , $location, ws) {
	var token = sessionStorage.token


    var msg = {
        'user': 'Test',
        'text': token,
        'time': moment().format('hh:mm a')
    };
    
    $scope.fromFactory = ws.send(msg);
})
   
.controller('marcadorCtrl', function($scope) {

})
   
.controller('ganadorCtrl', function($scope) {

})
   
.controller('perdedorCtrl', function($scope) {

})
   
.controller('errorCtrl', function($scope) {

})
 