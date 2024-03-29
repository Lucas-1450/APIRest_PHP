<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\LojasDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

final class LojaController
{
    public function getLojas(Request $request, Response $response, array $args): Response
    {

        $lojasDAO = new LojasDAO();
        $lojas = $lojasDAO->getAllLojas();
        $response = $response->withJson($lojas);

        return $response;
    }
    public function insertLoja(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();
        $loja->setNome($data['nome'])
             ->setTelefone($data['telefone'])
             ->setEndereco($data['endereco']);
        $lojasDAO->insertLoja($loja);

        $response = $response->withJson([
            'message' => 'Loja inserida com sucesso!'
        ]);
    
        return $response;
    }
    public function updateLoja(Request $request, Response $response, array $args): Response
    {

        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();
        $loja->setId((int)$data['id'])
             ->setNome($data['nome'])
             ->setTelefone($data['telefone'])
             ->setEndereco($data['endereco']);

        $lojasDAO->updateLoja($loja);
        $message = 'Loja atualizada com sucesso!';

    
        $response = $response->withJson([
            'message' => $message
        ]);
        

        return $response;
    }
    public function deleteLoja(Request $request, Response $response, array $args): Response
    {

        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();
        $loja->setId((int)$data['id']);

        $lojasDAO->deleteLoja($loja);
        $message = 'Loja excluída com sucesso!';

        $response = $response->withJson([
            'message' => $message
        ]);

        return $response;
    }
}
