<?php
// Inclui os arquivos de conexão e da classe Carro
require 'config.php';
require 'usuarios.php';

// Habilita a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cria a conexão com o banco de dados
$conexao = (new conexao())->conectar();

// Cria uma instância da classe usuario
$usuario = new usuarios($conexao);

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento']; {
    
        // Adiciona o usuario no banco de dados
        $usuario->adicionar($nome, $email, $senha, $telefone, $cpf, $nascimento);
    };

    // Redireciona para a página inicial
    header('Location: Login.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
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
        <form  method="post" action="cadastrar">
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
                    <a href="">Já tem uma conta cadastrada?</a>
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