<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoFashion</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body>

    <?php include 'views/header.php'; ?>


    <nav class="opcoes">
        <a href="views/produtos.php">Catálogo</a>
        <a href="views/Sobre.php">Sobre a Loja</a>
    </nav>
    <main>

        <div class="slider">
         
            <div class="carousel-container">
                <div class="carousel-slide">
                    <img src="images/banner_ludofashion1.png" alt="Banner 1" width="100%x">
                    <img src="images/banner_ludofashion2.png" alt="Banner 2" width="1538px">
                </div>
            </div>
        </div>

        <section class="conteudo">
            <h1>Desconto em toda a coleção verão</h1>
            <div class="card-container">
                <div class="card">
                    <div class="card-img">
                        <img src="../LudoFashion/imgs/Mulheres_ROSA" alt="" width="100%">
                    </div>
                    <div class="card-content">
                        <p>R$ 500</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="../LudoFashion/imgs/Mulheres_ROSA" alt="" width="100%">
                    </div>
                    <div class="card-content">
                        <p>R$ 500</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="../LudoFashion/imgs/Mulheres_ROSA" alt="" width="100%">
                    </div>
                    <div class="card-content">
                        <p>R$ 500</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="../LudoFashion/imgs/Mulheres_ROSA" alt="" width="100%">
                    </div>
                    <div class="card-content">
                        <p>R$ 500</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="../LudoFashion/imgs/Mulheres_ROSA" alt="" width="100%">
                    </div>
                    <div class="card-content">
                        <p>R$ 500</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'views/footer.php'; ?>
</body>



</html>