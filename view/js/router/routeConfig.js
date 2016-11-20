app.config(function ($stateProvider){
       
 var homeState = {
    name: 'home',
    url: '/',
    templateUrl: 'view/url/home.htm',
    controller: 'homeCtrl'
  }

  var aboutState = {
    name: 'about',
    url: '/about',
    template: '<h3>Its the UI-Router hello world app!</h3>'
  }

  $stateProvider.state(homeState);
  $stateProvider.state(aboutState);

});