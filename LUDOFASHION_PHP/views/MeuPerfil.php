<?php
session_start(); // Inicia a sessão
require 'conexao.php'; // Inclui a conexão com o banco de dados
require 'Usuarios.php'; // Inclui o arquivo que contém a classe Usuarios

$conn = (new Conexao())->conectar(); // Instancia a classe Conexao e obtém a conexão

// Verifique se a conexão foi bem-sucedida
if ($conn === null) {
    die("Erro ao conectar com o banco de dados");
}

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php'); // Redireciona para a página de login se não estiver logado
    exit();
}

// Recebe os dados do usuário logado
$user_id = $_SESSION['user_id'];

try {
    // Prepara a query para buscar os dados do usuário, incluindo o perfil
    $stmt = $conn->prepare("SELECT nome, email, telefone, cpf, nascimento, perfil FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute(); // Executa a query

    // Busca os dados do usuário e armazena nas variáveis
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifique se o usuário foi encontrado no banco de dados
    if ($user) {
        $nome = $user['nome'];
        $email = $user['email'];
        $telefone = $user['telefone'];
        $cpf = $user['cpf'];
        $nascimento = $user['nascimento'];
        $perfil_do_usuario = $user['perfil'];

        // Armazena o perfil do usuário na sessão
        $_SESSION['perfil'] = $perfil_do_usuario;
    } else {
        // Se o usuário não for encontrado, redireciona para o login ou outra ação
        header('Location: Login.php');
        exit();
    }

} catch (PDOException $e) {
    echo "Erro ao buscar dados do perfil: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - LudoFashion</title>
    <link rel="stylesheet" href="../css/MeuPerfil.css">
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
                <a href=""><img src="../images/Icon_user.png" alt="" width="40px"></a>
                <a href="" title="Minha Conta"><b>Minha Conta</b></a>
            </div>

            <?php
            // Verifica se a sessão 'perfil' está definida e se o valor dela é igual a 'normal'
            if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'normal') {
                 // Se ambas as condições forem verdadeiras, o código dentro deste bloco será executado.

                 // Exibe uma div contendo um link para a página 'ProdutosCadastrados.php' com o ícone e texto.
                 echo '
                <div class="options2">
                <a href=""><img src="../images/icon_favorite.png" alt="" width="40px"></a>
                <a href="ListadeDesejo.php" title="Lista de Desejos"><b>Lista de Desejos</b></a>
                </div>'; 
            }
            ?>
           
            <!-- Exibe a opção de produtos cadastrados para administradores -->
            <?php
            if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'administrador') {
                echo '
                <div class="options4">
                <a href="ProdutosCadastrados.php"><img src="../images/icon_invetario.png" alt="" width="40px"></a>
                <a href="ProdutosCadastrados.php" title="Produtos"><b>Produtos</b></a>
                </div>';
            }
            ?>

            </div>
        <div class="part2">
            <div class="perfil">
                <div class="titulo">
                <h1>Meu Perfil</h1>
                <p>Gerenciar e proteger sua conta</p>
                </div>
                <a class="btn-logout" href="logout.php">Desconectar</a>
            </div>

            <div class="conteudo" >
                <div class="nome-usuario">
                <h1>Perfil de <?php echo htmlspecialchars($user['nome']); ?></h1>
                </div>
                
                <div class="info-usuario">
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($user['nome']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Telefone:</strong> <?php echo htmlspecialchars($user['telefone']); ?></p>
                <p><strong>CPF:</strong> <?php echo htmlspecialchars($user['cpf']); ?></p>
                <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($user['nascimento']); ?></p>
                </div>

                <div class="modificar">
                    <a href="EditarUser.php" class="btn-edit">Editar</a>

                    <form action="DeletarUsuario.php" method="post" onsubmit="return confirm('Tem certeza que deseja deletar sua conta?');">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input class="btn-delete" type="submit" value="Deletar Conta">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>

</html>