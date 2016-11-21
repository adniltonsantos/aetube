<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";
$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
$app->post('/login', function(Request $request, Response $response){
	$post = json_decode($request->getBody(), true);
	$auth = new \App\Controller\Auth();
	$auth = $auth->login($post);
	$response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson($auth);
});

$app->run();