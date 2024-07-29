<?php
require 'GerenciadorCarros.php';

// Verifica se o índice do carro foi enviado via GET
if (isset($_GET['indice'])) {
    $indice = $_GET['indice'];

    // Gerencia o CRUD usando GerenciadorCarros
    $gerenciadorCarros = new GerenciadorCarros();
    $gerenciadorCarros->deletarCarro($indice);

    // Redireciona para a página principal
    header('Location: index.php');
    exit;
}
?>
