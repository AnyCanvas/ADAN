angular.module('app.services', [])

.factory('BlankFactory', [function(){

}])

.service('chat', function() {

	this.connect = function () {
		    var conn = new WebSocket('ws://104.236.71.12:8080');

			conn.onopen = function(e) {
				console.log("Connection established!");
    		};    

		    conn.onmessage = function(e) {
		        var msg = JSON.parse(e.data);
		        console.log(msg);
		    };

			conn.send = function(msg){
	            conn.send(JSON.stringify(msg));	    
    		}

			return conn;

   	}
    

})

.service('BlankService', [function(){

}]);


