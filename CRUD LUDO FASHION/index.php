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
    <title>CRUD de Produtos</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Banner com o nome da loja -->
        <header class="jumbotron text-center bg-primary text-white mb-4">
            <h1 class="display-4">Catálogo Ludo Fashion</h1>
            <p class="lead">Gerencie seu catálogo de produtos de forma eficiente</p>
        </header>

        <!-- Painel de Dashboard -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Painel de Controle</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-success text-white text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Total de Produtos</h5>
                                        <p class="card-text"><?= count($produtos) ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Adicione mais cards conforme necessário -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão para adicionar um novo produto -->
        <a href="adicionar.php" class="btn btn-success mb-3">Adicionar Produto</a>

        <!-- Formulário para deletar produtos selecionados -->
        <form action="index.php" method="post">
            <input type="hidden" name="deletar" value="1">

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Selecionar</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Tamanho</th>
                        <th>Descrição</th>
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

            <!-- Botão para deletar os produtos selecionados -->
            <button type="submit" class="btn btn-danger">Deletar Selecionados</button>
        </form>
    </div>

    <!-- Inclui o JS do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inclui o JS personalizado -->
    <script src="js/script.js"></script>
</body>
</html>
