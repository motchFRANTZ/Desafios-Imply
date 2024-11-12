CREATE DATABASE gerenciador_produtos;

USE gerenciador_produtos;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    descricao TEXT,
    categoria VARCHAR(100),
    imagem VARCHAR(255),
    avaliacao DECIMAL(3, 2)
);