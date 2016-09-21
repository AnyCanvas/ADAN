angular.module('app.services', [])

.factory('BlankFactory', [function(){

}])


.factory('ws', ['$q', '$rootScope', function($q, $rootScope, $location) {
    // We return this object to anything injecting our service
    var Service = {};

    // We return this object to anything injecting our service
    var wsService = {};

    // Keep all pending requests here until they get responses
    var callbacks = {};
    // Create a unique callback ID to map requests to responses
    var currentCallbackId = 0;
    // Create our websocket object with the address to the websocket
    var ws = new WebSocket("ws://104.236.43.23:8080");
    
	ws.onopen = function(e) {
		console.log("Connection established!");
	    var msg = {
	        'type': 'strChat',
	        'text': '0000',
	        'time': moment().format('hh:mm a')
	    };
		$rootScope.score = 0;			
		ws.send(JSON.stringify(msg));
    };    

	ws.onmessage = function(e) {
	    var msg = JSON.parse(e.data);
	    console.log(msg);
	    if (msg['type'] == 'chatId') {
			sessionStorage.chatId = msg['text'];
			console.log('Chat id saved');
		} else if (msg['type'] == 'team'){
			if(msg['text'] == 'red'){
				document.location.href = '/fut/#/waitRed';
			} else if (msg['text'] == 'white'){
			document.location.href = '/fut/#/waitWhite';
			}
		} else if (msg['type'] == 'play'){
			if(msg['text'] == 'red'){
				document.location.href = '/fut/#/marcadorRed';
			} else if (msg['text'] == 'white'){
			document.location.href = '/fut/#/marcadorWhite';
			}
		} else if(msg['type'] == 'goal'){
			$rootScope.score++;
		}else if (msg['type'] == 'final'){
			if(msg['text'] == 'win'){
				document.location.href = '/fut/#/ganador';
			} else if (msg['text'] == 'lose'){
			document.location.href = '/fut/#/perdedor';
			}
		}
	};

	wsService.getScore = function() {
	    console.log($rootScope.score);			
	    return $rootScope.score
	  }
	wsService.send = function(msg){
    	ws.send(JSON.stringify(msg));
	}

    return wsService;
}])

.service('chat', function() {

	this.connect = function (msg) {
		    var conn = new WebSocket('ws://104.236.43.23:8080');

			conn.onopen = function(e) {
				console.log("Connection established!");
				conn.send(msg);
    		};    

		    conn.onmessage = function(e) {
		        var msg = JSON.parse(e.data);
		        console.log(msg);
		    };

			return conn;
   	}

})

.service('BlankService', [function(){

}]);


