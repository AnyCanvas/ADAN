angular.module('app.services', [])

.factory('BlankFactory', [function(){

}])


.factory('ws', ['$q', '$rootScope', function($q, $rootScope) {
    // We return this object to anything injecting our service
    var Service = {};

    // We return this object to anything injecting our service
    var wsService = {};

    // Keep all pending requests here until they get responses
    var callbacks = {};
    // Create a unique callback ID to map requests to responses
    var currentCallbackId = 0;
    // Create our websocket object with the address to the websocket
    var ws = new WebSocket("ws://104.236.71.12:8080");
    
	ws.onopen = function(e) {
		console.log("Connection established!");
		ws.send('0000');
    };    

	ws.onmessage = function(e) {
	    var msg = JSON.parse(e.data);
	    console.log(msg);
	};


	wsService.send = function(msg){
    	ws.send(JSON.stringify(msg));
	}

    return wsService;
}])

.service('chat', function() {

	this.connect = function (msg) {
		    var conn = new WebSocket('ws://104.236.71.12:8080');

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


