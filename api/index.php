<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controller\Auth;
use \App\Controller\UsuarioController;
require_once "vendor/autoload.php";
$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
$auth = new Auth();
$app->post('/login', function(Request $request, Response $response) use ($auth){
	$post = json_decode($request->getBody(), true);
	$login = $auth->login($post);
	$response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($login);
});
$app->get('/user', function(Request $request, Response $response){
	$post = json_decode($request->getBody(),true);
	$usuario = new UsuarioController();
	$usuario->SalvaUsuario(array("cpf" => 38729417805, "nome" => "Guilherme Brito", "senha" => "guilbritto", ));
	$response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($usuario);
});


$app->run();