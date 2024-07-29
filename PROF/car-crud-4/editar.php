<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'Carro.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Carro
$carro = new Carro($conexao);

// Verifica se a requisição é do tipo POST (indicando que o formulário foi enviado)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário de edição
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];

    // Edita o carro no banco de dados chamando o método editar da classe Carro
    $carro->editar($id, $marca, $modelo, $ano, $cor);
    // Redireciona para a página inicial após a edição
    header('Location: index.php');
} else {
    // Obtém o ID do carro a ser editado a partir dos parâmetros da URL
    $id = $_GET['id'];
    // Obtém os dados do carro a ser editado usando o método listar da classe Carro
    $carroEditar = $carro->listar()[array_search($id, array_column($carro->listar(), 'id'))];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Carro</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Editar Carro</h1>

        <!-- Formulário de Edição -->
        <form action="editar.php" method="post" class="form-inline mb-3">
            <!-- Campo oculto para armazenar o ID do carro a ser editado -->
            <input type="hidden" name="id" value="<?= $carroEditar['id'] ?>">
            <!-- Campo para editar a marca do carro -->
            <input type="text" name="marca" class="form-control mr-2" placeholder="Marca" value="<?= $carroEditar['marca'] ?>" required>
            <!-- Campo para editar o modelo do carro -->
            <input type="text" name="modelo" class="form-control mr-2" placeholder="Modelo" value="<?= $carroEditar['modelo'] ?>" required>
            <!-- Campo para editar o ano do carro -->
            <input type="number" name="ano" class="form-control mr-2" placeholder="Ano" value="<?= $carroEditar['ano'] ?>" required>
            <!-- Campo para editar a cor do carro -->
            <input type="text" name="cor" class="form-control mr-2" placeholder="Cor" value="<?= $carroEditar['cor'] ?>" required>
            <!-- Botão para salvar as alterações -->
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
