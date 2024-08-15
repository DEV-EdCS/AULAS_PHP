<?php
// Inclui os arquivos de conexão e da classe Produtos
require 'conexao.php';
require 'produtos.php';

// Habilita a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cria a conexão com o banco de dados
$conn = (new Conexao())->conectar();

// Cria uma instância da classe Produtos
$produto = new Produtos($conn);

// Obtém a lista de produtos do banco de dados
$produtos = $produto->listar();

// Verifica se a requisição é do tipo POST (para deletar produtos)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletar'])) {
    // Verifica se há IDs de produtos selecionados
    if (isset($_POST['ids']) && !empty($_POST['ids'])) {
        // Obtém os IDs dos produtos a serem deletados
        $idsParaDeletar = $_POST['ids'];
        // Deleta os produtos selecionados
        $produto->deletar($idsParaDeletar);
    }
    // Redireciona para a página inicial
    header('Location: ProdutosCadastrados.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Produtos Cadastrados</title>
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="../css/ProdutosCadastrados.css" />
    
    <!-- Inclui o JS personalizado -->
    <script defer src="../js/script.js"></script>
</head>

<body>

    <?php include 'header.php'; ?>

    <nav>
        <a href="#">Catálogo</a>
        <a href="#">Sobre a Loja</a>
    </nav>
    <div class="container-fluid">
        <!-- Painel de Dashboard -->
        <div class="card-header">
            <h4>Painel de Controle</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Total de Produtos</h5>
            <p class="card-text">
                <?= count($produtos) ?>
            </p>
        </div>
        <!-- Formulário para deletar produtos selecionados -->
        <form id="deleteForm" action="ProdutosCadastrados.php" method="post">
            <!-- Botão para adicionar novo produto -->
             <div class="btn-topo">
            <div>
                <a href="adicionar.php" class="btn-success">Adicionar Produto</a>
            </div>
            <div>
            <input type="hidden" name="deletar" value="1">
            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Deletar Selecionados</button>
            </div>
            </div>
            <div>
               
                <table class="table">
                    <thead>
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
                                <input type="checkbox" name="ids[]" value="<?= $produto['id'] ?>">
                            </td>
                            <td width=210px>
                                <?php if ($produto['foto']): ?>
                                <img src="../uploads/<?= $produto['foto'] ?>" width="348px" height="218px"
                                    alt="Foto do Produto">
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($produto['nome']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($produto['cor']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($produto['tamanho']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($produto['descricao']) ?>
                            </td>
                            <td>
                                <a href="editar.php?id=<?= $produto['id'] ?>" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>