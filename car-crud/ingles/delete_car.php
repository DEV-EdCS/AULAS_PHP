<?php
require 'CarManager.php';

// Verifica se o índice do carro foi enviado via GET
if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Gerencia o CRUD usando CarManager
    $carManager = new CarManager();
    $carManager->deleteCar($index);

    // Redireciona para a página principal
    header('Location: index.html');
    exit;
}
?>
