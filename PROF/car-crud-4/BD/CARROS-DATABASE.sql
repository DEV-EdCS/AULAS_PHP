-- Cria o banco de dados carros_db
CREATE DATABASE carros_db;

-- Usa o banco de dados carros_db
USE carros_db;

-- Cria a tabela carros com os campos id, marca, modelo, ano e cor
CREATE TABLE carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    ano INT,
    cor VARCHAR(20)
);
