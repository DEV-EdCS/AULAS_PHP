<?php 
// PASSO 2
// Despois de criar o banco de dados é preciso configurar a conexão com o php

// Configurações de conexão
$servidor_banco = "localhost"; // Cria uma variável no php para se comunicar com o servidor local do banco de dados
$usuario_banco = "root"; // Para exemplo vamos usar o usuário administrador padrão "root" do MySQL
$senha_banco = ""; // Senha do usuário root (vazia no ambiente de desenvolvimento)
$nome_banco = "banco_dados"; // Nome do banco de dados que foi criado

// Criar conexão com o banco de dados
$conexao_banco = new mysqli($servidor_banco, $usuario_banco, $senha_banco, $nome_banco); // Cria uma variável que se comunica com a função mysqli(cria uma nova conexão com o banco de dados usando os parâmetros fornecidos)

// Cria uma função para verifica se houve erro na conexão
if ($conexao_banco->connect_error) { // Se houver, exibe uma mensagem de erro e interrompe a execução do script com 'die'
    die("Falha na conexão com o banco de dados: " . $conexao_banco->connect_error);
}
?>