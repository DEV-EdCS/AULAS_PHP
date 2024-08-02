<?php
// Inclui os arquivos de conexão e da classe Produtos
require 'conexao.php';
require 'produtos.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Produtos
$produto = new Produtos($conexao);

// Obtém a lista de produtos do banco de dados
$produtos = $produto->listar();

// Verifica se a requisição é do tipo POST (para deletar produtos)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletar'])) {
    // Obtém os IDs dos produtos a serem deletados
    $idsParaDeletar = $_POST['ids'];
    // Deleta os produtos selecionados
    $produto->deletar($idsParaDeletar);
    // Redireciona para a página inicial
    header('Location: index.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/style.css"/> 
</head>
<header>
    <a href="" class="icon-link">
        <img src="../imgs/Logo_LudoFashion.png" alt="" title="Home" width="100px">
    </a>

    <form action="" id="form-buscar">
        <input type="searh" name="Buscar" id="buscar" placeholder="O que você procura?">
        <button type="submit" id="btn-buscar"><img src="../imgs/icon_search.png" alt="" width="30px"></button>
    </form>

    <a href="" class="icon-link">
        <img src="../imgs/icon_personB.png" alt="" width="40px">
        Cadastre-se
    </a>

    <a href="" class="icon-link">
        <img src="../imgs/icon_helpB.png" alt="" width="40px">
        Dúvidas
    </a>
</header>
<body>
<nav>
<a href="">Catálogo</a>
<a href="">Sobre a Loja</a>
</nav>
<div class="container-fluid">
    <!-- Painel de Dashboard -->
    <div class="card-header">
        <h4>Painel de Controle</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">Total de Produtos</h5>
        <p class="card-text"><?= count($produtos) ?></p>
    </div>
    <div class="btn-edicao">
    <!-- Botão para adicionar um novo produto -->
    <a href="adicionar.php" class="btn btn-success mb-3">Adicionar Produto</a>

    <!-- Botão para deletar os produtos selecionados -->
    <button type="submit" class="btn btn-danger">Deletar Selecionados</button>
    </div>

    <!-- Formulário para deletar produtos selecionados -->
    <form action="index.php" method="post">
        <input type="hidden" name="deletar" value="1">

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr class="tabela">
                    <th>Selecionar</th>
                    <th>Foto</th>
                    <th>Descrição</th>
                    <th>Cor</th>
                    <th>Tamanho</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td>
                            <!-- Checkbox para selecionar o produto para deleção -->
                            <input type="checkbox" name="ids[]" value="<?= $produto['id'] ?>">
                        </td>
                        <td>
                            <!-- Exibe a foto do produto, se disponível -->
                            <?php if ($produto['foto']): ?>
                            <img src="uploads/<?= $produto['foto'] ?>" width="218" height="148" alt="Foto do Produto">
                                <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($produto['nome']) ?></td>
                        <td><?= htmlspecialchars($produto['cor']) ?></td>
                        <td><?= htmlspecialchars($produto['tamanho']) ?></td>
                        <td><?= htmlspecialchars($produto['descricao']) ?></td>
                        <td>
                        <!-- Link para editar o produto -->
                        <a href="editar.php?id=<?= $produto['id'] ?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </form>
</div>
    <!-- Inclui o JS personalizado -->
    <script src="js/script.js"></script>
</body>
</html>