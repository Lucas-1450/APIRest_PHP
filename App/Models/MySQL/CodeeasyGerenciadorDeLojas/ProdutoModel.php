<?php

namespace App\Models\MySQL\CodeeasyGerenciadorDeLojas;

final class ProdutoModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $loja_id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $preco;
    /**
     * @var string
     */
    private $quantidade;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProdutoModel
     */
    public function setId(string $id): ProdutoModel
    {
        $this->id = $id;
        return $this;
    }

    public function getIdLoja(): int
    {
        return $this->loja_id;
    }

    /**
     * @param int $loja_id
     * @return ProdutoModel
     */
    public function setIdLoja(string $loja_id): ProdutoModel
    {
        $this->loja_id = $loja_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return ProdutoModel
     */
    public function setNome(string $nome): ProdutoModel
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreco(): string
    {
        return $this->preco;
    }

    /**
     * @param string $preco
     * @return ProdutoModel
     */
    public function setPreco(string $preco): ProdutoModel
    {
        $this->preco = $preco;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantidade(): string
    {
        return $this->quantidade;
    }

    /**
     * @param string $quantidade
     * @return ProdutoModel
     */
    public function setQuantidade(string $quantidade): ProdutoModel
    {
        $this->quantidade = $quantidade;
        return $this;
    }
}