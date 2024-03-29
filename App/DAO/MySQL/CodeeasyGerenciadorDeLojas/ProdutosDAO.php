<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\ProdutoModel;

class ProdutosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProdutos(): array
    {
        $produtos = $this->pdo
            ->query('SELECT
                id,
                loja_id as loja,
                nome,
                preco,
                quantidade
            FROM produtos;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function getLastInsertedId(): int
    {
        $statement = $this->pdo
            ->query('SELECT MAX(id) AS max_id FROM produtos');
        $result = $statement
            ->fetch(\PDO::FETCH_ASSOC);

        return $result['max_id'];
    }

    public function insertProduto(ProdutoModel $produto): void
    {

        $id_aux = $this->getLastInsertedId();
        $next_id = $id_aux + 1;

        $statement = $this->pdo
            ->prepare('INSERT INTO produtos (id, loja_id, nome, preco, quantidade) VALUES (:id, :loja_id, :nome, :preco, :quantidade)');
        $statement->execute([
            'id' => $next_id,
            'loja_id' => $produto->getIdLoja(),
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'quantidade' => $produto->getQuantidade()
        ]);
    }

    public function updateProduto(ProdutoModel $produto): void
    {

        $id = $produto->getId();

        $statement = $this->pdo->prepare('UPDATE produtos SET 
            loja_id = :loja,
            nome = :nome,
            preco = :preco,
            quantidade = :quantidade
            WHERE id = :id
        ');

        $statement->execute([
            'id' => $id,
            'loja' => $produto->getIdLoja(),
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'quantidade' => $produto->getQuantidade()
        ]);
    }

    public function deleteProduto(ProdutoModel $produto): void
    {

        $id = $produto->getId();

        $statement = $this->pdo
            ->prepare('DELETE FROM produtos WHERE id = :id');
        $statement->execute([
            'id' => $id
        ]);
    }
}