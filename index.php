<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

#endpoint (router)
$app->get('/', function(Request $request, Response $response, $args){
    $response->getBody()->write("Helllo Word!");
    return $response;
});

$app->get('/fruits', function(Request $request, Response $response, $args){
    $fruits = [
        '1' => 'Banana',
        '2' => 'Laranja',
        '3' => 'Abacaxi'
    ];
    #retorna no formato json
    $response->getBody()->write(json_encode($fruits));
    return $response->withHeader('Content-type', 'application/json');
});

$app->get('/fruits/{id}', function(Request $request, Response $response, $args){
    $fruits = [
        '1' => 'Banana',
        '2' => 'Laranja',
        '3' => 'Abacaxi'
    ];
    #ira pegar dentro do array a posição que esta passando no id
    $fruit[$args['id']] = $fruits[$args['id']];
    #retorna no formato json
    $response->getBody()->write(json_encode($fruit));
    return $response->withHeader('Content-type', 'application/json');
});

$app->run();