<?php
require_once(__DIR__ . '/vendor/autoload.php');
$app = Slim\Factory\AppFactory::create();
$app->addErrorMiddleware($displayErrorDetails=true, $logErrors=true, $logErrorDetails=true);

$app->get('/v1/api', function (Psr\Http\Message\ServerRequestInterface $request, Psr\Http\Message\ResponseInterface $response) {
    $responseData = array('hello' => 'world');
    $responseBody = json_encode($responseData);
    $response = new \Slim\Psr7\Response($status=200);
    $response->getBody()->write($responseBody);
    $response = $response->withHeader('Content-Type', 'application/json');
    return $response;
});

$app->get('/v1/apiname/{name}', function (Psr\Http\Message\ServerRequestInterface $request, Psr\Http\Message\ResponseInterface $response, array $args) {
    $name = $args['name'];
    $responseData = array('name' => $name);
    $responseBody = json_encode($responseData);
    $response = new \Slim\Psr7\Response($status=200);
    $response->getBody()->write($responseBody);
    $response = $response->withHeader('Content-Type', 'application/json');
    return $response;
});

$app->run();