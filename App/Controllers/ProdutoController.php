<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\ProdutosDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\ProdutoModel;

final class ProdutoController
{
    public function getProdutos(Request $request, Response $response, array $args): Response
    {

        $produtosDAO = new ProdutosDAO();
        $produtos = $produtosDAO->getAllProdutos();
        $response = $response->withJson($produtos);

        return $response;
    }

    public function insertProduto(Request $request, Response $response, array $args): Response

    {
        $data = $request->getParsedBody();

        $produtosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $produto->setIdLoja($data['loja'])
             ->setNome($data['nome'])
             ->setPreco($data['preco'])
             ->setQuantidade($data['quantidade']);
        $produtosDAO->insertProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto adicionado com sucesso!'
        ]);
    
        return $response;
    }

    public function updateProduto(Request $request, Response $response, array $args): Response

    {

        $data = $request->getParsedBody();

        $produtosDAO = new ProdutosDAO;
        $produto = new ProdutoModel;
        $produto->setId((int)$data['id'])
             ->setIdLoja($data['loja'])
             ->setNome($data['nome'])
             ->setPreco($data['preco'])
             ->setQuantidade($data['quantidade']);
        $produtosDAO->updateProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto atualizado com sucesso!'
        ]);
        return $response;
    }

    public function deleteProduto(Request $request, Response $response, array $args): Response

    {

        $data = $request->getParsedBody();

        $ProdutosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $produto->setId((int)$data['id']);

        $ProdutosDAO->deleteProduto($produto);
        $message = 'Produto excluído com sucesso!';

        $response = $response->withJson([
            'message' => $message
        ]);

        return $response;
    }
}