CREATE DATABASE codeeasy_gerenciador_de_lojas CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;

USE codeeasy_gerenciador_de_lojas;

CREATE TABLE lojas (
	id INT UNSIGNED NOT NULL auto_increment,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(13) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)

);


CREATE TABLE produtos (

	id INT UNSIGNED NOT NULL auto_increment,
    loja_id INT UNSIGNED NOT NULL,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL NOT NULL,
    quantidade INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
	CONSTRAINT fk_produtos_loja_id_lojas_id
		FOREIGN KEY (loja_id) REFERENCES lojas(id)
);

INSERT INTO lojas (nome, telefone, endereco) 
VALUES ('codeeasy', '0000-0000', 'Rua CE');

INSERT INTO produtos (loja_id, nome, preco, quantidade)
VALUES (1, 'teclado', 40.00, 20);

SELECT * FROM lojas;
SELECT * FROM produtos;

SELECT 
	a.nome as loja,
    b.nome as produto,
    b.preco as preco,
    b.quantidade as quantidade
    FROM lojas a
    INNER JOIN produtos b
    ON b.loja_id = a.id
    WHERE b.nome = 'teclado'
    ORDER BY b.nome;
    
