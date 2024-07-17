<?php
require 'GerenciadorCarros.php';

// Gerencia o CRUD usando GerenciadorCarros
$gerenciadorCarros = new GerenciadorCarros();
$carros = $gerenciadorCarros->getCarros();

// Exibe a lista de carros
if (!empty($carros)) {
    foreach ($carros as $indice => $carro) {
        echo "<div class='item-carro'>";
        echo "Marca: " . htmlspecialchars($carro['marca']) . "<br>";
        echo "Modelo: " . htmlspecialchars($carro['modelo']) . "<br>";
        echo "Ano: " . htmlspecialchars($carro['ano']) . "<br>";
        echo "Cor: " . htmlspecialchars($carro['cor']) . "<br>";
        echo "<a class='botao-deletar' href='deletar_carro.php?indice={$indice}'>Deletar</a>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum carro encontrado.</p>";
}
?>
