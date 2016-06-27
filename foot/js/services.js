angular.module('app.services', [])

.factory('BlankFactory', [function(){

}])

.service('BlankService', [function(){

}]);


app.service('hexafy', function() {
    this.myFunc = function (x) {
        return x.toString(16);
    }
});