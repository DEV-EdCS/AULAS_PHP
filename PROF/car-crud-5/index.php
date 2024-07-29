<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'Carro.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Carro
$carro = new Carro($conexao);

// Obtém a lista de carros do banco de dados
$carros = $carro->listar();

// Verifica se a requisição é do tipo POST (para deletar carros)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletar'])) {
    // Obtém os IDs dos carros a serem deletados
    $idsParaDeletar = $_POST['ids'];
    // Deleta os carros selecionados
    $carro->deletar($idsParaDeletar);
    // Redireciona para a página inicial
    header('Location: index.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Carros</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Banner com o nome da loja -->
        <header class="jumbotron text-center bg-primary text-white mb-4">
            <h1 class="display-4">Loja de Carros</h1>
            <p class="lead">Gerencie seu inventário de carros de forma eficiente</p>
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
                                        <h5 class="card-title">Total de Carros</h5>
                                        <p class="card-text"><?= count($carros) ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Adicione mais cards conforme necessário -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão para adicionar um novo carro -->
        <a href="adicionar.php" class="btn btn-success mb-3">Adicionar Carro</a>

        <!-- Formulário para deletar carros selecionados -->
        <form action="index.php" method="post">
            <input type="hidden" name="deletar" value="1">

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Selecionar</th>
                        <th>Foto</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Cor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carros as $carro): ?>
                        <tr>
                            <td>
                                <!-- Checkbox para selecionar o carro para deleção -->
                                <input type="checkbox" name="ids[]" value="<?= $carro['id'] ?>">
                            </td>
                            <td>
                                <!-- Exibe a foto do carro, se disponível -->
                                <?php if ($carro['foto']): ?>
                                    <img src="uploads/<?= $carro['foto'] ?>" width="218" height="148" alt="Foto do Carro">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($carro['marca']) ?></td>
                            <td><?= htmlspecialchars($carro['modelo']) ?></td>
                            <td><?= htmlspecialchars($carro['ano']) ?></td>
                            <td><?= htmlspecialchars($carro['cor']) ?></td>
                            <td>
                                <!-- Link para editar o carro -->
                                <a href="editar.php?id=<?= $carro['id'] ?>" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Botão para deletar os carros selecionados -->
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
