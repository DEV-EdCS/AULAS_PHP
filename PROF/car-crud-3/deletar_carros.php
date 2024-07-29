<?php
require 'GerenciadorCarros.php';

// Verifica se os índices dos carros foram enviados via POST
if (isset($_POST['indices'])) {
    $indices = $_POST['indices'];

    // Gerencia o CRUD usando GerenciadorCarros
    $gerenciadorCarros = new GerenciadorCarros();
    $gerenciadorCarros->deletarCarros($indices);

    // Redireciona para a página principal
    header('Location: index.php');
    exit;
}
?>
