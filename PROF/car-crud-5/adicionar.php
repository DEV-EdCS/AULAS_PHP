<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'Carro.php';

// Habilita a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();

// Cria uma instância da classe Carro
$carro = new Carro($conexao);

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];

    // Lida com o upload da foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fotoTmp = $_FILES['foto']['tmp_name'];
        $fotoNome = uniqid() . '.jpg'; // Gera um nome único para a foto
        $destino = 'uploads/' . $fotoNome;

        // Redimensiona a imagem para 218x148 px
        list($larguraOriginal, $alturaOriginal) = getimagesize($fotoTmp);
        $imagemOriginal = imagecreatefromjpeg($fotoTmp);
        $imagemRedimensionada = imagecreatetruecolor(218, 148);
        imagecopyresampled($imagemRedimensionada, $imagemOriginal, 0, 0, 0, 0, 218, 148, $larguraOriginal, $alturaOriginal);
        imagejpeg($imagemRedimensionada, $destino);

        // Adiciona o carro no banco de dados
        $carro->adicionar($marca, $modelo, $ano, $cor, $fotoNome);
    } else {
        // Adiciona o carro sem foto no banco de dados
        $carro->adicionar($marca, $modelo, $ano, $cor, null);
    }

    // Redireciona para a página inicial
    header('Location: index.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Carro</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <!-- Banner com o nome da loja -->
        <header class="jumbotron text-center bg-primary text-white mb-4">
            <h1 class="display-4">Loja de Carros</h1>
            <p class="lead">Adicionar Novo Carro</p>
        </header>

        <!-- Formulário de Adição -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulário de Adição</h4>
            </div>
            <div class="card-body">
                <form action="adicionar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" required>
                    </div>
                    <div class="form-group">
                        <label for="ano">Ano:</label>
                        <input type="number" name="ano" id="ano" class="form-control" placeholder="Ano" required>
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor:</label>
                        <input type="text" name="cor" id="cor" class="form-control" placeholder="Cor" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" name="foto" id="foto" class="form-control-file" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn btn-success">Adicionar Carro</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclui o JS do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inclui o JS personalizado -->
    <script src="js/script.js"></script>
</body>
</html>

