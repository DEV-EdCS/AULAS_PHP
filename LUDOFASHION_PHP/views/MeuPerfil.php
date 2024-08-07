<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - LudoFashion</title>
    <link rel="stylesheet" href="../css/MeuPerfil.css">
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
    <section class="lista">
        <div class="part1">
            <div class="options1">
                <a href=""><img src="../imgs/Icon_user.png" alt="" width="40px"></a>
                <a href="" title="Minha Conta"><b>Minha Conta</b></a>
            </div>
            <div class="options2">
                <a href=""><img src="../imgs/icon_favorite.png" alt="" width="40px"></a>
                <a href="../views/ListadeDesejo.html" title="Lista de Desejos"><b>Lista de Desejos</b></a>
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

            <form class="conteudo">
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
                    <a href=""><img src="imgs/icon_twitter.png" title="Nosso perfil no X" alt="Twitter"
                            width="30px"></a>
                    <a href=""><img src="imgs/icon_tiktok.png" title="As trends do momento" alt="TikTok"
                            width="30px"></a>
                </div>
            </div>
        </div>
        <p>© 2024 LudoFashion. Todos os direitos reservados.</p>
    </footer>
</body>

</html>