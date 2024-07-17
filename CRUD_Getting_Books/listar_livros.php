<?php


// Gerencia o CRUD usando GerenciadorLivros
$gerenciadorLivros = new GerenciadorLivros();
$livros = $gerenciadorLivros->getLivros();

// Exibe a lista de livros
if (!empty($livros)) {
    foreach ($livros as $indice => $livros) {
        
    }
}
?>