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
    cpf CHAR(11) NOT NULL,
    nascimento CHAR(8) NOT NULL,
    perfil ENUM('normal', 'administrador') DEFAULT 'normal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção do administrador inicial
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Administrador', 'admin@gmail.com', SHA2('senha_admin', 256), 'administrador');