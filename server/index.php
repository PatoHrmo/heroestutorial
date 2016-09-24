<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../server_modules/autoload.php';
spl_autoload_register(function ($classname) {
    require ("heroesDatabase.php");
});
$app = new \Slim\App;
$container = $app->getContainer();
$container['database'] = function($c) {
    return new HeroesDatabase();
};
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->get('/getallheroes', function (Request $request, Response $response) {
    $data = $this->database->getAllHeroes();
    $newresponse = $response->withJson($data);

    return $newresponse;
});

$app->run();
