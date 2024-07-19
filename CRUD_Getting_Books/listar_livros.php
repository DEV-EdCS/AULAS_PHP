<?php
require 'GerenciadorLivros.php';

// Gerencia o CRUD usando GerenciadorLivros
$GerenciadorLivros = new GerenciadorLivros();
$livros = $GerenciadorLivros->getLivros();

// Exibe a lista de livros
if (!empty($livros)) {
    foreach ($livros as $indice => $livro) {
        echo "<div class='item-livro'>";
        echo "Titulo: " . htmlspecialchars($livro['titulo']) . "<br>";
        echo "Sinopse: " . htmlspecialchars($livro['sinopse']) . "<br>";
        echo "Editora: " . htmlspecialchars($livro['editora']) . "<br>";
        echo "Ano: " . htmlspecialchars($livro['ano']) . "<br>";
        echo "ISNB: " . htmlspecialchars($livro['isbn']) . "<br>";
        echo "Cadastrado em: " . htmlspecialchars($livro['cadastrado']) . "<br>";
        echo "Estado de conservação: " . htmlspecialchars($livro['estado']) . "<br>";
        /*echo "Capa: " . htmlspecialchars($livro['capa']) . "<br>";*/
        echo "< class='botap-deletar' href='deletar_livro.php? indice={$indice}'>Deletar</a>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum livro encontrado</p>";
}
?>