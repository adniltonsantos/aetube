app.config(function ($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise("/");
 var homeState = {
    name: 'home',
    url: '/',
    templateUrl: 'view/url/home.htm',
    controller: 'homeCtrl'
  }

  var sobreState = {
    name: 'sobre',
    url: '/sobre',
    template: '<h3>Its the UI-Router hello world app!</h3>'
  }

  $stateProvider.state(homeState);
  $stateProvider.state(sobreState);

});