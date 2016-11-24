app.config(function ($stateProvider, $urlRouterProvider){
  
  $stateProvider
    .state('home', {
      url: '/home',
      templateUrl: 'view/site/home.htm',
         controller:'homeCtrl'
    })

    .state('home.inicio', {
      url:'/inicio',
      templateUrl: 'view/site/inicio.htm'

    })

    .state('home.teste', {
      url:'/teste',
      templateUrl: 'view/site/teste.htm'
    })

    .state('home.leiaMais', {
      url:'/leiaMais',
      templateUrl: 'view/site/leiaMais.htm'
    })

      .state('associado', {
      url:'/associado',
      templateUrl: 'view/associado/home.htm'
    })


  $urlRouterProvider.otherwise("/home/inicio");



});