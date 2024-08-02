CREATE DATABASE ludo_fashion;
USE ludo_fashion;

CREATE TABLE produtos (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
tamanho VARCHAR(50),
cor VARCHAR(50),
preco VARCHAR(50),
descricao VARCHAR(150)
);