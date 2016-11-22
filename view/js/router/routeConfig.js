app.config(function ($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise("/");
 var homeState = {
    name: 'home',
    url: '/',
    templateUrl: 'view/site/home.htm',
    controller: 'homeCtrl'
  }

  var associadoState = {
    name: 'associado',
    url: '/associado',
    templateUrl: 'view/associado/home.htm'
  }

  $stateProvider.state(homeState);
  $stateProvider.state(associadoState);

});