<?php

use function src\slimConfiguration;
use function src\basicAuth;
use function src\jwtAuth;
use App\Controllers\ProdutoController;
use App\Controllers\LojaController;
use App\Controllers\AuthController;
use App\Controllers\ExceptionController;
use App\Middlewares\JwtDateTimeMiddleware;

use Tuupola\Middleware\JwtAuthentication;

$app = new \Slim\App(slimConfiguration());

//  ==================================================

//O versionamento pode ser utilizado com o "group".
$app->group('/v1', function() use($app) {
    $app->get('/test-with-versions', function() { return "oi v1"; });
});

$app->group('/v2', function() use($app) {
    $app->get('/test-with-versions', function() { return "oi v2"; });
});

//  ==================================================

// Tratativa de exceções
$app->get('/exception-test', '\App\Controllers\ExceptionController:test');

//  ==================================================

// Sistema de autencicação com jwt
$app->post('/login', '\App\Controllers\AuthController:login');
$app->post('/refresh-token', '\App\Controllers\AuthController:refreshToken');

// Replicando a requisição de autenticação por meio de Middlewares
$app->get('/teste', function($request, $response) {var_dump($request->getAttribute('jwt'));})
    ->add(new JwtDateTimeMiddleware())
    ->add(jwtAuth());

//  ==================================================

// Requisições de CRUD em duas tabelas do nosso DB
$app->group('', function() use ($app){
    $app->get('/loja', '\App\Controllers\LojaController:getLojas');
    $app->post('/loja' , '\App\Controllers\LojaController:insertLoja');
    $app->put('/loja', '\App\Controllers\LojaController:updateLoja');
    $app->delete('/loja', '\App\Controllers\LojaController:deleteLoja');

    $app->get('/produto', '\App\Controllers\ProdutoController:getProdutos');
    $app->post('/produto' , '\App\Controllers\ProdutoController:insertProduto');
    $app->put('/produto', '\App\Controllers\ProdutoController:updateProduto');
    $app->delete('/produto', '\App\Controllers\ProdutoController:deleteProduto');
})->add(basicAuth());

//  ==================================================

/* 
COMO CONTINUAR?

- DUCUMENTAÇÃO - RALM OU SWAGGER
- OUTRAS ARQUITETURAS DE SOFTWARE OU FRAMEWORK
- OAUTH 2.0 (OUTRO SISTEMA DE AUTENTICAÇÃO)
-VÁ ALÉM...
*/




$app->run();