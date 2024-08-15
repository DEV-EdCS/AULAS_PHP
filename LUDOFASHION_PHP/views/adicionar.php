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
        $destino = '../uploads/' . $fotoNome;

        // Verifica se o arquivo é uma imagem JPEG
        if (exif_imagetype($fotoTmp) === IMAGETYPE_JPEG) {
            // Obtém as dimensões originais da imagem
            list($larguraOriginal, $alturaOriginal) = getimagesize($fotoTmp);

            // Define a largura máxima e calcula a altura proporcional
            $larguraMax = 348;
            $alturaMax = 218;

            $fatorProporcao = min($larguraMax / $larguraOriginal, $alturaMax / $alturaOriginal);
            $novaLargura = round($larguraOriginal * $fatorProporcao);
            $novaAltura = round($alturaOriginal * $fatorProporcao);

            $imagemOriginal = imagecreatefromjpeg($fotoTmp);
            $imagemRedimensionada = imagecreatetruecolor($novaLargura, $novaAltura);

            // Redimensiona mantendo a proporção da imagem original
            imagecopyresampled($imagemRedimensionada, $imagemOriginal, 0, 0, 0, 0, $novaLargura, $novaAltura, $larguraOriginal, $alturaOriginal);
            imagejpeg($imagemRedimensionada, $destino);
            imagedestroy($imagemOriginal);
            imagedestroy($imagemRedimensionada);
        } else {
            echo "Erro: A foto deve ser uma imagem JPEG.";
            exit();
        }

        // Adiciona o produto no banco de dados
        $produto->adicionar($nome, $cor, $tamanho, $descricao, $fotoNome);
    } else {
        // Adiciona o produto sem foto no banco de dados
        $produto->adicionar($nome, $cor, $tamanho, $descricao, null);
    }

    // Redireciona para a página inicial
    header('Location: ProdutosCadastrados.php');
    exit(); // Certifica de que o script é encerrado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="../css/AdicionarProduto.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<?php include 'header.php'; ?>
<nav>
        <a href="#">Catálogo</a>
        <a href="#">Sobre a Loja</a>
    </nav>
    <div class="formulario">
        <!-- Banner com o nome da loja -->
        <div class="cabecalho-add">
            <h1 class="titulo1">Catálogo Ludo Fashion</h1><br>
            <p>Adicionar Novo Produto</p><br>
        </div>

        <!-- Formulário de Adição -->
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
                    <button type="submit" class="btn-success">Adicionar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
