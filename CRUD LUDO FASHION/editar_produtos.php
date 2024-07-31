<?php
include 'conexao_bd.php';

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id=$id";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();
} else {
    echo "Produto não encontrado";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>

<h2>Editar Produto</h2>

<form action="atualizar_produto.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
    Cor: <input type="text" name="cor" value="<?php echo $produto['cor']; ?>" required><br>
    Tamanho: <input type="text" name="tamanho" value="<?php echo $produto['tamanho']; ?>" required><br>
    Descrição: <textarea name="descricao" required><?php echo $produto['descricao']; ?></textarea><br>
    Imagem atual: <img src="uploads/<?php echo $produto['imagem']; ?>" alt="Imagem do Produto" width="100"><br>
    Atualizar Imagem: <input type="file" name="imagem"><br>
    <input type="submit" value="Atualizar Produto">
</form>

</body>
</html>
