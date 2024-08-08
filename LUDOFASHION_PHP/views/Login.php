<?php
// Login.php

session_start(); // Inicia a sessão
require 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']); // Criptografa a senha com SHA-256

    try {
        // Prepara a query para buscar o usuário
        $stmt = $conn->prepare("SELECT id, nome, email, perfil FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute(); // Executa a query

        if ($stmt->rowCount() > 0) {
            // Se o usuário for encontrado, cria a sessão
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_perfil'] = $user['perfil'];
            header('Location: MeuPerfil.php'); // Redireciona para a página de perfil
        } else {
            echo "E-mail ou senha incorretos"; // Mensagem de erro
        }
    } catch (PDOException $e) {
        // Tratamento de erro
        echo "Erro no login: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - LudoFashion</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<header>
    <a href="" class="icon-link">
        <img src="../imgs/Logo_LudoFashion.png" alt="" title="Home" width="100px">
    </a>

    <form action="" id="form-buscar">
        <input type="searh" name="Buscar" id="buscar" placeholder="O que você procura?">
        <button type="submit" id="btn-buscar"><img src="../imgs/icon_search.png" alt="" width="30px"></button>
    </form>

    <a href="" class="icon-link">
        <img src="../imgs/icon_personB.png" alt="" width="40px">
        Cadastre-se
    </a>

    <a href="" class="icon-link">
        <img src="../imgs/icon_helpB.png" alt="" width="40px">
        Dúvidas
    </a>
</header>

<nav>

    <a href="">Catálogo</a>

    <a href="">Sobre a Loja</a>

</nav>

<body>
    <section class="logar">
        <div class="login">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="formatar">
                <div class="preencher">
                    <label for="email">E-mail</label><br>
                    <input class="input" type="text" name="email" id="email">
                </div>
                <div class="preencher">
                    <label for="senha">Senha</label><br>
                    <input class="input" type="text" name="senha" id="senha">
                </div>
                <div class="preencher">
                    <input type="submit" id="botao" class="botao" value="Login">
                </div>
                <div class="preencher">
                    <p>OU</p>
                </div>
                <div class="opcoes">
                    <a href="https://mail.google.com/"><img src="../imgs/icon_google.png" alt="" width="40px"></a>

                    <a href="https://www.facebook.com/"><img src="../imgs/icon_face.png" alt="" width="40px"></a>
                </div class="opcoes1">
                    <a href="">Cadastrar</a>
                    <a href="">Precisa de ajuda?</a>
                </div>
            </div>
        </form>
    </div>
    </section>

</body>

</html>