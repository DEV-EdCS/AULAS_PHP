<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'Carro.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Carro
$carro = new Carro($conexao);

// Lista todos os carros do banco de dados
$carros = $carro->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Carros</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">CRUD de Carros</h1>

        <!-- Formulário de Adição -->
        <form action="adicionar.php" method="post" class="form-inline mb-3">
            <input type="text" name="marca" class="form-control mr-2" placeholder="Marca" required>
            <input type="text" name="modelo" class="form-control mr-2" placeholder="Modelo" required>
            <input type="number" name="ano" class="form-control mr-2" placeholder="Ano" required>
            <input type="text" name="cor" class="form-control mr-2" placeholder="Cor" required>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>

        <!-- Tabela de Carros -->
        <form action="deletar.php" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Selecionar</th>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Cor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop para exibir cada carro -->
                    <?php foreach ($carros as $carro): ?>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="<?= $carro['id'] ?>"></td>
                            <td><?= $carro['id'] ?></td>
                            <td><?= $carro['marca'] ?></td>
                            <td><?= $carro['modelo'] ?></td>
                            <td><?= $carro['ano'] ?></td>
                            <td><?= $carro['cor'] ?></td>
                            <td>
                                <!-- Link para editar o carro -->
                                <a href="editar.php?id=<?= $carro['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger">Deletar Selecionados</button>
        </form>
    </div>
    <!-- Inclui o JavaScript personalizado -->
    <script src="js/script.js"></script>
</body>
</html>
