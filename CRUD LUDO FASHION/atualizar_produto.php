<?php
include 'conexao_bd.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['name'];

if ($imagem) {
    $target = "uploads/" . basename($imagem);
    move_uploaded_file($_FILES['imagem']['tmp_name'], $target);
    $sql = "UPDATE produtos SET nome='$nome', cor='$cor', tamanho='$tamanho', descricao='$descricao', imagem='$imagem' WHERE id=$id";
} else {
    $sql = "UPDATE produtos SET nome='$nome', cor='$cor', tamanho='$tamanho', descricao='$descricao' WHERE id=$id";
}

if ($conexao->query($sql) === TRUE) {
    echo "Produto atualizado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();

header("Location: listar_produtos.php");
exit;
?>
