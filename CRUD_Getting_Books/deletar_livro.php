<?php
require 'GerenciadorLivros.php';

// Verifica se o índice do Livros foi enviado via GET
if (isset($_GET['indice'])) {
    $indice = $_GET['indice'];

    // Gerencia o CRUD usando GerenciadorLivros
    $GerenciadorLivros = new GerenciadorLivros();
    $GerenciadorLivros->deletarLivro($indice);

    // Redireciona para a página principal
    header('Location: index.php');
    exit;
}
?>