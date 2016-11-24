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
/**
*   Autentica o usuario
*/
$auth = new Auth();
$app->post('/login', function(Request $request, Response $response) use ($auth){
	$post = json_decode($request->getBody(), true);
	$login = $auth->login($post);
	$response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($login);
});

/**
* Salva Usuario 
*/
$app->post('/user', function(Request $request, Response $response){
	$post = json_decode($request->getBody(),true);
	$usuario = new UsuarioController();
	$usuario->SalvaUsuario();
	$response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($usuario);
});

/**
*   Update Usuario
*/
$app->put('/user/{id}', function(Request $request, Response $response, $args){
    $post       = json_decode($request->getBody());
    $usuario    = new UsuarioController();
    $post['id'] = $args['id'];
    $usuario->EditaUsuario($post);
    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($usuario);
});

/**
*   Lista todos Usuarios
*/
$app->get('/user', function(Request $request, Response $response){
    $usuario  = new UsuarioController();
    $usuario  = $usuario->ListaUsuario();
    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($usuario);
});

/**
*   Inativa o Usuario
*/
$app->delete('/user', function(Request $request, Response $response){
    $usuario  = new UsuarioController();
    $usuario  = $usuario->InativaUsuario();
    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($usuario);
});









$app->get('/test', function(Request $request, Response $response){
    $post = array(
        "cpf"       => 38729417805,
        "senha"     => "guilbritto",
        "nome"      => "Guilherme Brito",
        "updateAt"  => $_SERVER['REQUEST_TIME']
        );
    $usuario = new UsuarioController();
    $usuario->EditaUsuario($post);
    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($usuario);
});

$app->run();
