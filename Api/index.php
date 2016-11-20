<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";
$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
$app->get('/', function(Request $request, Response $response){
	
	$response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson(array("message" => "Bem Vindo"));
});

$app->run();