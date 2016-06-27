angular.module('app.services', [])

.factory('BlankFactory', [function(){

}])

.service('chat', function() {

	this.connect = function () {
		    var conn = new WebSocket('ws://' + window.location.hostname + ':8080');

			conn.onopen = function(e) {
				console.log("Connection established!");
    		};    

		    conn.onmessage = function(e) {
		        var msg = JSON.parse(e.data);
		        updateMessages(msg);
		    };
    }
})

.service('BlankService', [function(){

}]);


