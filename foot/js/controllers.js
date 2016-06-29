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
			document.location.href = 'http://soyfanbot.com/foot/#/codigo';	
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

	$ionicModal.fromTemplateUrl('templates/modal.html', {
	    scope: $scope
	  }).then(function(modal) {
	    $scope.modal = modal;
	  });

	$scope.sendFriendId = function(u) {        
	    var msg = {
	        'type': 'friendChatId',
	        'text': u.firstName,
	        'time': moment().format('hh:mm a')
	    };
	    
	    $scope.fromFactory = ws.send(msg);
	    $scope.modal.hide();
	  };

	$scope.$on('$routeChangeStart', function(next, current) { 
	    current.modal.hide();
	 });

	console.log($location.search().id);

    $scope.chatId = sessionStorage.chatId;

	$scope.$watch(function () {
	  return sessionStorage.chatId;
	}, function (value) {
	  $scope.chatId = value;
	}, true);

})
   
.controller('likeCtrl', function($scope, $location, $ionicModal, ws) {

})
   
.controller('marcadorCtrl', function($scope, $timeout, ws) {

  $scope.score = ws.getScore();


  $timeout(function(){
    $scope.score = ws.getScore();
  }, 1000);
})
   
.controller('ganadorCtrl', function($scope) {

})
   
.controller('perdedorCtrl', function($scope) {

})
   
.controller('errorCtrl', function($scope) {

})
 