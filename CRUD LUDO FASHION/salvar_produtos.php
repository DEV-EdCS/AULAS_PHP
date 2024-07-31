<?php
include 'conexao_bd.php';

$nome = $_POST['nome'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['name'];
$target = "uploads/" . basename($imagem);

// Movendo o arquivo de imagem para o diretório 'uploads'
if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target)) {
    $sql = "INSERT INTO produtos (nome, cor, tamanho, descricao, imagem) VALUES ('$nome', '$cor', '$tamanho', '$descricao', '$imagem')";

    if ($conexao->query($sql) === TRUE) {
        echo "Novo produto inserido com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conexao->error;
    }
} else {
    echo "Erro ao fazer o upload da imagem";
}

$conexao->close();

header("Location: listar_produtos.php");
exit;
?>
