<?php
session_start(); // Inicia a sessão
require 'conexao.php'; // Inclui a conexão com o banco de dados
require 'Usuarios.php'; // Inclui o arquivo que contém a classe Usuarios


$conn = (new Conexao())->conectar(); // Instancia a classe Conexao e obtém a conexão

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php'); // Redireciona para a página de login se não estiver logado
    exit();
}

// Obtém o ID do usuário logado
$user_id = $_SESSION['user_id'];

// Instancia a classe Usuarios
$usuarios = new Usuarios($conn);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];

    // Atualiza os dados do usuário no banco de dados
    $usuarios->atualizar($user_id, $nome, $email, $telefone, $cpf, $nascimento);

    // Redireciona para a página de perfil
    header('Location: MeuPerfil.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}

// Obtém os dados do usuário para exibição no formulário
$user = $usuarios->obterPorId($user_id);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - LudoFashion</title>
    <link rel="stylesheet" href="../css/EditarUser.css">
</head>

<?php include '../views/header.php'; ?>

<nav>

    <a href="Busca.php">Catálogo</a>

    <a href="Sobre.php">Sobre a Loja</a>

</nav>

<body>
    <section class="lista">
        <div class="part1">
            <div class="options1">
                <a href="#"><img src="../imgs/Icon_user.png" alt="" width="40px"></a>
                <a href="#" title="Minha Conta"><b>Minha Conta</b></a>
            </div>
            <div class="options2">
                <a href="#"><img src="../imgs/icon_favorite.png" alt="" width="40px"></a>
                <a href="ListadeDesejo.php" title="Lista de Desejos"><b>Lista de Desejos</b></a>
            </div>
            <div class="options3">
                <a href="#"><img src="../imgs/icon_categorias.png" alt="" width="40px"></a>
                <a href="#" title="Categorias"><b>Categorias</b></a>
            </div>
            <div class="options4">
                <a href="#"><img src="../imgs/icon_invetario.png" alt="" width="40px"></a>
                <a href="#" title="Produtos"><b>Produtos</b></a>
            </div>
        </div>
        <div class="part2">
            <div class="titulo">
                <h1>Meu Perfil</h1>
                <p>Gerenciar e proteger sua conta</p>
            </div>

            <form action="EditarUser.php" method="post" class="conteudo">
                <div class="question">
                    <label for="nome">Nome:</label>
                    <label for="email">Email:</label>
                    <label for="telefone">Número de telefone:</label>
                    <label for="cpf">CPF:</label>
                    <label for="nascimento">Data de Nascimento:</label>
                </div>
                <div class="resposta">
                    <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($user['nome']); ?>" required readonly>
                    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']); ?>" required>
                    <input type="tel" name="telefone" id="telefone" value="<?= htmlspecialchars($user['telefone']); ?>" required>
                    <input type="text" name="cpf" id="cpf" value="<?= htmlspecialchars($user['cpf']); ?>" required>
                    <input type="date" max="2006-08-07" name="nascimento" id="nascimento" value="<?= htmlspecialchars($user['nascimento']); ?>" required>
                </div>
                <div class="modificar">
                    <input class="btn-envia" type="submit" value="Gravar">
                </div>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>

</html>