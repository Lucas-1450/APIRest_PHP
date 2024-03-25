<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function teste()
    {
        $lojas = $this->pdo
            ->query('SELECT * FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        echo '<pre>';    
        foreach ($lojas as $loja) {
            var_dump($loja);
        }
        die;
    }
}