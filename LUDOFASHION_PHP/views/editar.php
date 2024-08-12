<?php
// Inclui os arquivos de conexão e da classe Carro
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
    header('Location: index.php');
    exit();
}

// Obtém os dados do produto para o formulário
$dadosProduto = $produto->obterPorId($id);
if (!$dadosProduto) {
    header('Location: index.php');
    exit();
}

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $descricao = $_POST['descricao'];
    $fotoNome = $dadosProduto['foto'];

     // Lida com o upload da foto
     if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fotoTmp = $_FILES['foto']['tmp_name'];
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $fotoNome = uniqid() . '.' . $extensao; // Gera um nome único para a foto
        $destino = 'uploads/' . $fotoNome;

        // Verifica o tipo de arquivo
        if ($extensao == 'jpg' || $extensao == 'jpeg') {
            // Redimensiona a imagem para 218x348 px
            list($larguraOriginal, $alturaOriginal) = getimagesize($fotoTmp);
            $imagemOriginal = imagecreatefromjpeg($fotoTmp);
            $imagemRedimensionada = imagecreatetruecolor(218, 348);
            imagecopyresampled($imagemRedimensionada, $imagemOriginal, 0, 0, 0, 0, 218, 348, $larguraOriginal, $alturaOriginal);
            imagejpeg($imagemRedimensionada, $destino);
            imagedestroy($imagemOriginal);
            imagedestroy($imagemRedimensionada);
        } else {
            echo "Formato de imagem não suportado.";
            exit();
        }
    }


    // Atualiza os dados do produto no banco de dados
    $produto->atualizar($id, $nome, $cor, $tamanho, $descricao, $fotoNome);

    // Redireciona para a página inicial
    header('Location: index.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Carro</title>
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-- Banner com o nome da loja -->
        <header class="jumbotron text-center bg-primary text-white mb-4">
            <h1 class="display-4">Produtos Cadastrados</h1>
            <p class="lead">Editar Produtos</p>
        </header>

        <!-- Formulário de Edição -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulário de Edição</h4>
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
                                <img src="uploads/<?= htmlspecialchars($dadosProduto['foto']) ?>" width="218" height="148" alt="Foto do Produto">
                            </div>
                            <?php endif; ?>
                        <input type="file" name="foto" id="foto" class="form-control-file" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn btn-warning">Atualizar Produto</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclui o JS personalizado -->
    <script src="js/script.js"></script>
</body>
</html>
