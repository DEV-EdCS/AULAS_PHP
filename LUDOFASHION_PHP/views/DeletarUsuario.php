<?php
session_start(); // Inicia a sessão
require 'conexao.php'; // Inclui a conexão com o banco de dados
require 'Usuarios.php'; // Inclui o arquivo que contém a classe Usuarios

$conn = (new Conexao())->conectar(); // Instancia a classe Conexao e obtém a conexão

if ($conn === null) {
    die("Erro ao conectar com o banco de dados");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    $usuarios = new Usuarios($conn);
    $usuarios->deletar($user_id);

    // Destrói a sessão e redireciona para a página de login ou home
    session_destroy();
    header('Location: Login.php'); // Ou a página que preferir
    exit();
}
?>
