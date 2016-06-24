angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider
    
  

      .state('inicioDeSesion', {
    url: '/inicio',
    templateUrl: 'templates/inicioDeSesion.html',
    controller: 'inicioDeSesionCtrl'
  })

  .state('codigo', {
    url: '/codigo',
    templateUrl: 'templates/codigo.html',
    controller: 'codigoCtrl'
  })

  .state('like', {
    url: '/like',
    templateUrl: 'templates/like.html',
    controller: 'likeCtrl'
  })

  .state('marcador', {
    url: '/marcador',
    templateUrl: 'templates/marcador.html',
    controller: 'marcadorCtrl'
  })

  .state('ganador', {
    url: '/ganador',
    templateUrl: 'templates/ganador.html',
    controller: 'ganadorCtrl'
  })

  .state('perdedor', {
    url: '/perdedor',
    templateUrl: 'templates/perdedor.html',
    controller: 'perdedorCtrl'
  })

  .state('error', {
    url: '/error',
    templateUrl: 'templates/error.html',
    controller: 'errorCtrl'
  })

$urlRouterProvider.otherwise('/inicio')

  

});