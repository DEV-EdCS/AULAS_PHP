-- Criação do banco de dados
CREATE DATABASE ludo_fashion;

-- Seleção do banco de dados
USE ludo_fashion;

-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(100) NOT NULL,
    cpf CHAR(14) NOT NULL,
    nascimento VARCHAR(10) NOT NULL,
    perfil ENUM('normal', 'administrador') DEFAULT 'normal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção do administrador inicial
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Administrador', 'admin@gmail.com', SHA2('senha_admin', 256), 'administrador');


-- Criação da Tabela de produtos
CREATE TABLE produtos (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
tamanho VARCHAR(50),
cor VARCHAR(50),
preco VARCHAR(50),
descricao VARCHAR(150)
);