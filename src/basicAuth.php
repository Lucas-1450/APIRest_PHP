<?php

namespace src;

use Tuupola\Middleware\HttpBasicAuthentication;

function basicAuth(): HttpBasicAuthentication
{
    return new HttpBasicAuthentication([
        //Desafio: tentar pegar as informações abaixo de uma tabela "usuarios" do bando de dados.
        "users" => [
            "root" => "teste123"
        ]
        ]);
}