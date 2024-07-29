<?php
require 'GerenciadorCarros.php';

// Gerencia o CRUD usando GerenciadorCarros
$gerenciadorCarros = new GerenciadorCarros();
$carros = $gerenciadorCarros->getCarros();

// Exibe a lista de carros
if (!empty($carros)) {
    foreach ($carros as $indice => $carro) {
        echo "<div class='row item-carro mb-3'>";
        echo "<div class='col-md-2'>";
        echo "<input type='checkbox' name='indices[]' value='{$indice}'> ";
        echo "</div>";
        echo "<div class='col-md-3'>";
        // Verifica se a chave 'foto' existe e se o arquivo de imagem existe
        if (isset($carro['foto']) && file_exists($carro['foto'])) {
            echo "<a href='" . htmlspecialchars($carro['foto']) . "' data-lightbox='carro'><img src='" . htmlspecialchars($carro['foto']) . "' class='img-carro'></a>";
        } else {
            echo "Sem foto disponível";
        }
        echo "</div>";
        echo "<div class='col-md-7'>";
        echo "Marca: " . htmlspecialchars($carro['marca']) . "<br>";
        echo "Modelo: " . htmlspecialchars($carro['modelo']) . "<br>";
        echo "Ano: " . htmlspecialchars($carro['ano']) . "<br>";
        echo "Cor: " . htmlspecialchars($carro['cor']) . "<br>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum carro encontrado.</p>";
}
?>

