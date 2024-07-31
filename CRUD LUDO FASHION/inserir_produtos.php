<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inserir Produto</title>
</head>
<body>

<h2>Inserir Produto</h2>

<form action="salvar_produto.php" method="post" enctype="multipart/form-data">
    Nome: <input type="text" name="nome" required><br>
    Cor: <input type="text" name="cor" required><br>
    Tamanho: <input type="text" name="tamanho" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    Imagem: <input type="file" name="imagem" required><br>
    <input type="submit" value="Salvar Produto">
</form>

</body>
</html>
