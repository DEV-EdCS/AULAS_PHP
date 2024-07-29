<?php
require 'Car.php';
require 'CarManager.php';

// Verifica se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];

    // Cria um novo objeto Car
    $car = new Car($brand, $model, $year, $color);

    // Gerencia o CRUD usando CarManager
    $carManager = new CarManager();
    $carManager->addCar($car);

    // Redireciona para a página principal
    header('Location: index.html');
    exit;
}
?>
