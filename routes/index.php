<?php

use function src\slimConfiguration;
use function src\basicAuth;
use App\Controllers\ProdutoController;
use App\Controllers\LojaController;



$app = new \Slim\App(slimConfiguration());

//  ==================================================

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




$app->run();