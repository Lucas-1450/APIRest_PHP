<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\LojasDAO;

final class ProductController
{
    public function getProducts(Request $request, Response $response, array $args): Response

    {
        $response = $response->withJson([
            "message" => "Hello World"
        ]);

        $lojaDAO = new LojasDAO();
        $LojasDAO->teste();

        return $response;
    }
}