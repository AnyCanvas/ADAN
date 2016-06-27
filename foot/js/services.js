angular.module('app.services', [])

.factory('BlankFactory', [function(){

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


