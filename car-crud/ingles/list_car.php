<?php
require 'CarManager.php';

// Gerencia o CRUD usando CarManager
$carManager = new CarManager();
$cars = $carManager->getCars();

// Exibe a lista de carros
if (!empty($cars)) {
    foreach ($cars as $index => $car) {
        echo "<div class='car-item'>";
        echo "Brand: " . htmlspecialchars($car['brand']) . "<br>";
        echo "Model: " . htmlspecialchars($car['model']) . "<br>";
        echo "Year: " . htmlspecialchars($car['year']) . "<br>";
        echo "Color: " . htmlspecialchars($car['color']) . "<br>";
        echo "<a class='delete-button' href='delete_car.php?index={$index}'>Delete</a>";
        echo "</div>";
    }
} else {
    echo "<p>No cars found.</p>";
}
?>
