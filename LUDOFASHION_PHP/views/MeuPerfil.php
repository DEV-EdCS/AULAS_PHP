<?php
// MeuPerfil.php

session_start(); // Inicia a sessão
require 'conexao.php'; // Inclui a conexão com o banco de dados

$conn = (new Conexao())->conectar(); // Instancia a classe Conexao e obtém a conexão

// Verifique se a conexão foi bem-sucedida
if ($conn === null) {
    die("Erro ao conectar com o banco de dados");
}

// Usa-se $conn para preparar e executar consultas
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php'); // Redireciona para a página de login se não estiver logado
    exit();
}

// Recebe os dados do usuário logado
$user_id = $_SESSION['user_id'];

try {
    // Prepara a query para buscar os dados do usuário
    $stmt = $conn->prepare("SELECT nome, email, telefone, cpf, nascimento FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute(); // Executa a query

    // Busca os dados e preenche as variáveis
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $user['nome'];
    $email = $user['email'];
    $telefone = $user['telefone'];
    $cpf = $user['cpf'];
    $nascimento = $user['nascimento'];
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

    <a href="">Catálogo</a>

    <a href="">Sobre a Loja</a>

</nav>

<body>
    <section class="lista">
        <div class="part1">
            <div class="options1">
                <a href=""><img src="../imgs/Icon_user.png" alt="" width="40px"></a>
                <a href="" title="Minha Conta"><b>Minha Conta</b></a>
            </div>
            <div class="options2">
                <a href=""><img src="../imgs/icon_favorite.png" alt="" width="40px"></a>
                <a href="ListadeDesejo.php" title="Lista de Desejos"><b>Lista de Desejos</b></a>
            </div>
            <div class="options3">
                <a href=""><img src="../imgs/icon_categorias.png" alt="" width="40px"></a>
                <a href="" title="Categorias"><b>Categorias</b></a>
            </div>
            <div class="options4">
                <a href=""><img src="../imgs/icon_invetario.png" alt="" width="40px"></a>
                <a href="" title="Produtos"><b>Produtos</b></a>
            </div>
        </div>
        <div class="part2">
            <div class="titulo">
                <h1>Meu Perfil</h1>
                <p>Gerenciar e proteger sua conta</p>
            </div>

            <form for="MeuPerfil.php" class="conteudo">
         
                <div class="question">
                    <label for="nome">Nome:</label>
                    <label for="email">Email:</label>
                    <label for="phone">Número de telefone:</label>
                    <label for="cpf">CPF:</label>
                    <label for="nascimento">Data de Nascimento</label>
                </div>
                <div class="resposta">
                    <input type="text" name="nome" id="nome" value="" required placeholder="Seu nome completo">

                    <input type="text" name="email" id="email" value="" required placeholder="Seu email">

                    <input type="tel" name="phone" id="phone" value="" required placeholder="(xx) xxxxx-xxxx">

                    <input type="number" name="cpf" id="cpf" value="" required placeholder="Digite seu CPF">

                    <input type="date" name="nascimento" id="nascimento" value="" required
                        placeholder="Sua data de nascimento">

                </div>
                <div class="modificar">
                    <input class="btn-edit" type="submit" value="Editar">
                    <input class="btn-envia" type="submit" value="Gravar">
                </div>
            </form>
        </div>
    </section>

    <?php include '../views/footer.php'; ?>
    
</body>

</html>