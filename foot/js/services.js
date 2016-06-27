angular.module('app.services', [])

.factory('BlankFactory', [function(){

}])

service('hexafy', function() {
    this.myFunc = function (x) {
        return x.toString(16);
    }
})

.service('BlankService', [function(){

}]);


