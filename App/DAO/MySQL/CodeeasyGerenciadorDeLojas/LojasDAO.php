<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLojas(): array
    {
        $lojas = $this->pdo
            ->query('SELECT
                id,
                nome,
                telefone,
                endereco
            FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $lojas;
    }

    public function getLastInsertedId(): int
    {
        $statement = $this->pdo
            ->query('SELECT MAX(id) AS max_id FROM lojas');
        $result = $statement
            ->fetch(\PDO::FETCH_ASSOC);

        return $result['max_id'];
    }

    public function insertLoja(LojaModel $loja): void
    {

        $id_aux = $this->getLastInsertedId();
        $next_id = $id_aux + 1;

        $statement = $this->pdo
            ->prepare('INSERT INTO lojas (id, nome, telefone, endereco) VALUES (:id, :nome, :telefone, :endereco)');
        $statement->execute([
            'id' => $next_id,
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }

    public function updateLoja(LojaModel $loja): void
    {

        $id = $loja->getId();

        $statement = $this->pdo->prepare('UPDATE lojas SET 
            nome = :nome,
            telefone = :telefone,
            endereco = :endereco
            WHERE id = :id
        ');

        $statement->execute([
            'id' => $id,
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }

    public function deleteLoja(LojaModel $loja): void
    {

        $id = $loja->getId();

        $statement = $this->pdo
            ->prepare('DELETE FROM lojas WHERE id = :id');
        $statement->execute([
            'id' => $id
        ]);
    }
}