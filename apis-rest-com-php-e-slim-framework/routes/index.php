<?php

use function src\slimConfiguration;
use App\Controllers\ProductContoller;


$app = new \Slim\App(slimConfiguration());

//  ==================================================

$app->get('/', '\App\Controllers\ProductController:getProducts' );


//  ==================================================




$app->run();