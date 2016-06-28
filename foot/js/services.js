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
    };    

	ws.onmessage = function(e) {
	    var msg = JSON.parse(e.data);
	    console.log(msg);
	};


	wsService.send = function(msg){
    	ws.send(JSON.stringify(msg));
	}
	
    function sendRequest(request) {
      var defer = $q.defer();
      var callbackId = getCallbackId();
      callbacks[callbackId] = {
        time: new Date(),
        cb:defer
      };
      request.callback_id = callbackId;
      console.log('Sending request', request);
      ws.send(JSON.stringify(request));
      return defer.promise;
    }

    function listener(data) {
      var messageObj = data;
      console.log("Received data from websocket: ", messageObj);
      // If an object exists with callback_id in our callbacks object, resolve it
      if(callbacks.hasOwnProperty(messageObj.callback_id)) {
        console.log(callbacks[messageObj.callback_id]);
        $rootScope.$apply(callbacks[messageObj.callback_id].cb.resolve(messageObj.data));
        delete callbacks[messageObj.callbackID];
      }
    }
    // This creates a new callback ID for a request
    function getCallbackId() {
      currentCallbackId += 1;
      if(currentCallbackId > 10000) {
        currentCallbackId = 0;
      }
      return currentCallbackId;
    }

    // Define a "getter" for getting customer data
    Service.getCustomers = function() {
      var request = {
        type: "get_customers"
      }
      // Storing in a variable for clarity on what sendRequest returns
      var promise = sendRequest(request); 
      return promise;
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


