<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Desejos - LudoFashion</title>
    <link rel="stylesheet" href="../css/ListadeDesejo.css">
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
                <a href="../views/MeuPerfil.html"><img src="../images/Icon_user.png" alt="" width="40px"></a>
                <a href="MeuPerfil.php" title="Minha Conta"><b>Minha Conta</b></a>
            </div>
            <div class="options2">
                <a href=""><img src="../images/icon_favorite.png" alt="" width="40px"></a>
                <a href="" title="Lista de Desejos"><b>Lista de Desejos</b></a>
            </div>
            <!-- <div class="options3">
                <a href=""><img src="../images/icon_categorias.png" alt="" width="40px"></a>
                <a href="" title="Categorias"><b>Categorias</b></a>
            </div> -->
            <div class="options4">
                <a href="ProdutosCadastros.php"><img src="../images/icon_invetario.png" alt="" width="40px"></a>
                <a href="" title="Produtos"><b>Produtos</b></a>
            </div>
        </div>

        <div class="part2">
        <div class="perfil">
                <div class="titulo">
                <h1>Meu Perfil</h1>
                <p>Gerenciar e proteger sua conta</p>
                </div>
                <a class="btn-logout" href="logout.php">Desconectar</a>
            </div>

            <div class="conteudo">
                <div>
                    <a href=""><img src="../imgs/Product_1.png" alt="" width="110px"></a>
                </div>
                <div>
                    <a href=""><strong>Saia Feminina Xadrez</strong></a><br>
                    <a href="">Branco, Preto e Azul</a>
                </div>
                <div>
                    <a href=""><strong>R$ 75,00</strong></a>
                </div>
            </div>
            <div class="conteudo">
                <div>
                    <a href=""><img src="../imgs/Product_2.png" alt="" width="110px"></a>
                </div>
                <div>
                    <a href=""><strong>Blusa Feminina Fitness Animal</strong></a><br>
                    <a href="">Branco, Preto e Azul</a>
                </div>
                <div>
                    <a href=""><strong>R$ 110,00</strong></a>
                </div>
            </div>
            <div class="conteudo">
                <div>
                    <a href=""><img src="../imgs/Product_3.png" alt="" width="110px"></a>
                </div>
                <div>
                    <a href=""><strong>Vestido Festa Laranja</strong></a><br>
                    <a href="">Branco, Preto e Azul</a>
                </div>
                <div>
                    <a href=""><strong>R$ 75,00</strong></a>
                </div>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>

</html>