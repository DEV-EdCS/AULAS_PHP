<?php
// Inclui os arquivos de conexão e da classe Produtos
require 'conexao.php';
require 'produtos.php';

// Habilita a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();

// Cria uma instância da classe Produtos
$produto = new Produtos($conexao);

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $descricao = $_POST['descricao'];

    // Lida com o upload da foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fotoTmp = $_FILES['foto']['tmp_name'];
        $fotoNome = uniqid() . '.jpg'; // Gera um nome único para a foto
        $destino = 'uploads/' . $fotoNome;

       // Redimensiona a imagem para 218x348 px
        list($larguraOriginal, $alturaOriginal) = getimagesize($fotoTmp);
        $imagemOriginal = imagecreatefromjpeg($fotoTmp);
        $imagemRedimensionada = imagecreatetruecolor(218, 348);
        imagecopyresampled($imagemRedimensionada, $imagemOriginal, 0, 0, 0, 0, 348, 218, $larguraOriginal, $alturaOriginal);
        imagejpeg($imagemRedimensionada, $destino);

        // Adiciona o produto no banco de dados
        $produto->adicionar($nome, $cor, $tamanho, $descricao, $fotoNome);
    } else {
        // Adiciona o produto sem foto no banco de dados
        $produto->adicionar($nome, $cor, $tamanho, $descricao, null);
    }

    // Redireciona para a página inicial
    header('Location: index.php');
    exit(); // Certifica de que o script é encerrado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-- Banner com o nome da loja -->
        <header class="cabecalho-add">
            <h1 class="titulo1">Catálogo Ludo Fashion</h1><br>
            <p>Adicionar Novo Produto</p><br>
        </header>

        <!-- Formulário de Adição -->
         <div>
        <div class="card">
            <div class="titulo2">
                <h4 class="titulo-painel">Formulário de Adição</h4>
            </div>
            <div class="card-body">
                <form action="adicionar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome:</label><br>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor:</label><br>
                        <input type="text" name="cor" id="cor" class="form-control" placeholder="Cor" required>
                    </div>
                    <div class="form-group">
                        <label for="tamanho">Tamanho:</label><br>
                        <input type="text" name="tamanho" id="tamanho" class="form-control" placeholder="Tamanho" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label><br>
                        <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label><br>
                        <input type="file" name="foto" id="foto" class="form-control-file" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn btn-success">Adicionar Produto</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Inclui o JS personalizado -->
    <script src="js/script.js"></script>
</body>
</html>

