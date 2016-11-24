app.controller('homeCtrl', function($scope , usuarioAPI){

	$scope.logando = function (values, formAut){
	
		usuarioAPI.getUsuario(values).success(function(response){
			var login = response.values;
			console.log(login);

		});

	};

});