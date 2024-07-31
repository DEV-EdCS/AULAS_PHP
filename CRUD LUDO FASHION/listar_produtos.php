<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>LudoFashion - Produtos</title>
    <style href="../style.css"></style>
</head>
<body>

<div class="header">
    <h1>LudoFashion</h1>
    <button class="btn" onclick="window.location.href='inserir_produto.php'">Inserir Produto</button>
</div>

<div class="container">
    <h2>Produtos cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>cod. produto</th>
                <th>nome do Produto</th>
                <th>Cor</th>
                <th>Tamanho</th>
                <th>Descrição do produto</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexao_bd.php';
            $sql = "SELECT * FROM produtos";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['cor'] . "</td>";
                    echo "<td>" . $row['tamanho'] . "</td>";
                    echo "<td>" . $row['descricao'] . "</td>";
                    echo "<td><img src='uploads/" . $row['imagem'] . "' alt='Imagem do Produto'></td>";
                    echo "<td>
                            <a href='editar_produto.php?id=" . $row['id'] . "'>Editar</a> |
                            <a href='deletar_produto.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja deletar este produto?\");'>Deletar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhum produto cadastrado</td></tr>";
            }
            $conexao->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
