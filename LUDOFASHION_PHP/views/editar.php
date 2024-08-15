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

// Verifica se um ID de Produtos foi passado
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ProdutosCadastrados.php');
    exit();
}

// Obtém os dados do produto para o formulário
$dadosProduto = $produto->obterPorId($id);
if (!$dadosProduto) {
    header('Location: ProdutosCadastrados.php');
    exit();
}

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

        // Atualiza o produto no banco de dados
        $produto->atualizar($id, $nome, $cor, $tamanho, $descricao, $fotoNome);
    } else {
        // Atualiza o produto sem foto no banco de dados
        $produto->atualizar($id, $nome, $cor, $tamanho, $descricao, null);
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
    <title>Editar Produto</title>
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="../css/EditarProduto.css">
    <!-- Inclui o JS personalizado -->
    <script defer src="js/script.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<nav>

    <a href="Busca.php">Catálogo</a>

    <a href="Sobre.php">Sobre a Loja</a>

</nav>
    <div class="formulario">
    <h1>Produtos Cadastrados</h1>
    <p>Editar Produtos</p>
    </div>
    <div>

        <!-- Formulário de Edição -->
        <div class="formulario">
            <div class="card-topo">
                <h4 class="">Formulário de Edição</h4>
            </div>
            <div class="card-body">
                <form action="editar.php?id=<?= htmlspecialchars($id) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($dadosProduto['nome']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor:</label>
                        <input type="text" name="cor" id="cor" class="form-control" value="<?= htmlspecialchars($dadosProduto['cor']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tamanho">Tamanho:</label>
                        <input type="text" name="tamanho" id="tamanho" class="form-control" value="<?= htmlspecialchars($dadosProduto['tamanho']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" name="descricao" id="descricao" class="form-control" value="<?= htmlspecialchars($dadosProduto['descricao']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <?php if ($dadosProduto['foto']): ?>
                            <div>
                                <img src="uploads/<?= htmlspecialchars($dadosProduto['foto']) ?>" width="218" height="348" alt="Foto do Produto">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="foto" id="foto" class="form-control-file" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn-warning">Atualizar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
