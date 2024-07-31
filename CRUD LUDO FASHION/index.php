<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFashion</title>
    <link rel="stylesheet" href="style.css">
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
    
    <section>

        <h1>Cadastro de Produtos</h1>
        <h2>Detalhes do produto</h2>

        <div class="forma">
            <form action="">

                <div class="formulario">
                    <div>
                        <fieldset>
                            <label for="text">Código do produto</label>
                            <input type="text">
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <label for="text">Nome do produto</label>
                            <input type="text">
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <label for="color">Cor</label>
                            <input type="color">
                            <input type="color">
                            <input type="color">
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <label for="tamanho">Tamanho</label>
                            <select name="tamanho-roupa" id="tam">
                                <option value="p">P</option>
                                <option value="m">M</option>
                                <option value="g">G</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
            </form>

            <form action="">
                <div class="formulario2">
                    <fieldset>
                        <label for="foto">Foto do Produto</label>
                        <input type="file" name="foto" id="foto" accept="image/*">
                    </fieldset>
                    <fieldset>
                        <label for="descricao" id="descricao" cols="10" rows="10">Descrição</label>
                        <textarea name="descricao" id="descricao" cols="-20" rows="-10"></textarea>
                    </fieldset>
                </div>
                
            </form>
            <div class="formulario3">
                <a href=""><input class="butao" type="submit" name="confirmar" value="Confirmar"></a>
            </div>
        </div>

    </section>
   
</body>
<footer>
    <div class="container">
        <div>
            <h2>Institucional</h2>
            <ul>
                <a href="">
                    <li>Quem Somos?</li>
                </a>
            </ul>
        </div>
        <div>
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
        <div>
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
                <a href=""><img src="imgs/icon_facebook.png" title="Acompamhe as novidades no Face" alt="Facebook"
                        width="30px"></a>
                <a href=""><img src="imgs/icon_twitter.png" title="Crie uma treta" alt="Twitter" width="30px"></a>
                <a href=""><img src="imgs/icon_tiktok.png" title="As trends do momento" alt="TikTok"
                        width="30px"></a>
            </div>
        </div>
    </div>
    <p>© 2024 LudoFashion. Todos os direitos reservados.</p>
</footer>
</html>