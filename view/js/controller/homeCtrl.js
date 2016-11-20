app.controller('homeCtrl', function($scope , usuarioAPI){

	$scope.logando = function (values, formAut){
	
		usuarioAPI.getUsuario(values).success(function(response){

			if (login == false){
				
			}

		});

	};

});