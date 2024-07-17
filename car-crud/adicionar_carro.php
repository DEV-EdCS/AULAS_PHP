<?php
require 'Carro.php';
require 'GerenciadorCarros.php';

// Verifica se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];

    // Cria um novo objeto Carro
    $carro = new Carro($marca, $modelo, $ano, $cor);

    // Gerencia o CRUD usando GerenciadorCarros
    $gerenciadorCarros = new GerenciadorCarros();
    $gerenciadorCarros->adicionarCarro($carro);

    // Redireciona para a página principal
    header('Location: index.php');
    exit;
}
?>
