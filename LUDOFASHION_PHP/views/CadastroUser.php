<?php
require 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']); // Criptografa a senha com SHA-256
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $perfil = 'normal';  // Define o perfil padrão como 'normal'

    try {
        // Prepara a query de inserção
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, telefone, cpf, nascimento, perfil) 
                                VALUES (:nome, :email, :senha, :telefone, :cpf, :nascimento, :perfil)");
        // Associa os parâmetros da query aos valores recebidos
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->execute(); // Executa a query
        echo "Cadastro realizado com sucesso!"; // Mensagem de sucesso
    } catch (PDOException $e) {
        // Tratamento de erro
        echo "Erro no cadastro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - LudoFashion</title>
    <link rel="stylesheet" href="../css/CadastroUser.css">
</head>

<body>
    <header>
        <a href="" class="icon-link">
            <img src="../LudoFashion/imgs/Logo_LudoFashion.png" alt="" title="Home" width="100px">
        </a>

        <form action="" id="form-buscar">
            <input type="searh" name="Buscar" id="buscar" placeholder="O que você procura?">
            <button type="submit" id="btn-buscar"><img src="imgs/icon_search.png" alt="" width="30px"></button>
        </form>

        <a href="" class="icon-link">
            <img src="imgs/icon_person.png" alt="" width="40px">
            Cadastre-se
        </a>

        <a href="" class="icon-link">
            <img src="imgs/icon_help.png" alt="" width="40px">
            Dúvidas
        </a>

    </header>
    <nav>

        <a href="">Catálogo</a>

        <a href="">Sobre a Loja</a>

    </nav>

    <section class="conteudo">
        <h1>Bem vindo à Ludo Fashion</h1>
        <form  method="post" action="CadastoUser.php">
            <div>
                <div class="formulario1">
                    <label for="nome"><b>Nome:</b></label>
                    <input class="preencher" type="text" name="nome" id="nome" placeholder="   Insira seu nome completo" required>
                </div>
                <div class="formulario1">
                    <label  for="email"><b>Email:</b></label>
                    <input class="preencher" type="email" name="email" id="email" placeholder="   Insira seu email" required>
                </div>
                <div class="formulario1">
                    <label for="password"><b>Senha:</b></label>
                    <input class="preencher" type="senha" name="senha" id="senha" placeholder="   Insira sua senha" required>
                </div>
                <div class="formulario1">
                    <label for="telefone"><b>Telefone:</b></label>
                    <input class="preencher" type="tel" name="telefone" id="telefone" placeholder="   Insira seu telefone" required>
                </div>
                <div class="formulario1">
                    <label for="cpf"><b>CPF:</b></label>
                    <input class="preencher" type="number" name="cpf" id="cpf" placeholder="   Insira seu CPF" required>
                </div>
                <div class="formulario1">
                    <label for="nascimento"><b>Data de Nascimento:</b></label>
                    <input class="preencher" type="date" max="2006-08-07"name="nascimento" id="nascimento" placeholder="Sua data de nascimento" required>
                </div>
            </div>
            <div class="enviar">
                <div>
                    <input class="btn-enviar" type="submit" class="btn-envio" value="ENVIAR">
                </div>
                <div>
                    <a href="/views/Login.php">Já tem uma conta cadastrada?</a>
                </div>
            </div>
        </form>
    </section>

</body>
<footer>
    <div class="container">
        <div class="rodape-text">
            <h2>Institucional</h2>
            <ul>
                <a href="">
                    <li>Quem Somos?</li>
                </a>
            </ul>
        </div>
        <div class="rodape-text">
            <h2>Ajuda</h2>
            <ul>
                <a href="">
                    <li>Central de ajuda</li>
                </a>
            </ul>
            <ul>
                <a href="">
                    <li>Dúvidas</li>
                </a>
            </ul>
        </div>
        <div class="rodape-text">
            <h2>Navegue Pelo Site</h2>
            <ul>
                <a href="">
                    <li>Roupas mais procuradas</li>
                </a>
            </ul>
            <ul>
                <a href="">
                    <li>Principais marcas</li>
                </a>
            </ul>
        </div>
        <div>
            <h2>Redes Sociais</h2>
            <div class="social-media">
                <a href=""><img src="imgs/icon_whatsapp.png" title="Fale conosco via WhatsApp" alt="WhatsApp"
                        width="30px"></a>
                <a href=""><img src="imgs/icon_instagram.png" title="Siga para mais novidades" alt="Instagram"
                        width="30px"></a>
                <a href=""><img src="imgs/icon_facebook.png" title="Acompanhe as novidades no Face" alt="Facebook"
                        width="30px"></a>
                <a href=""><img src="imgs/icon_twitter.png" title="Nosso perfil no X" alt="Twitter" width="30px"></a>
                <a href=""><img src="imgs/icon_tiktok.png" title="As trends do momento" alt="TikTok" width="30px"></a>
            </div>
        </div>
    </div>
    <p>© 2024 LudoFashion. Todos os direitos reservados.</p>
</footer>

</html>