angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider
    
  

      .state('inicioDeSesion', {
    url: '/page1',
    templateUrl: 'templates/inicioDeSesion.html',
    controller: 'inicioDeSesionCtrl'
  })

  .state('codigo', {
    url: '/page3',
    templateUrl: 'templates/codigo.html',
    controller: 'codigoCtrl'
  })

  .state('like', {
    url: '/page4',
    templateUrl: 'templates/like.html',
    controller: 'likeCtrl'
  })

  .state('score', {
    url: '/page6',
    templateUrl: 'templates/score.html',
    controller: 'scoreCtrl'
  })

  .state('ganador', {
    url: '/page7',
    templateUrl: 'templates/ganador.html',
    controller: 'ganadorCtrl'
  })

  .state('perdedor', {
    url: '/page8',
    templateUrl: 'templates/perdedor.html',
    controller: 'perdedorCtrl'
  })

  .state('error', {
    url: '/page9',
    templateUrl: 'templates/error.html',
    controller: 'errorCtrl'
  })

$urlRouterProvider.otherwise('/page1')

  

});