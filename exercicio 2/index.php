<?php
// Define a URL da PokéAPI para obter os dados do Pokémon Lucario
$url = "https://pokeapi.co/api/v2/pokemon/lucario";

// Obtém a resposta da URL
$resposta = file_get_contents($url);

// Decodifica a resposta JSON para um array associativo
$transformado = json_decode($resposta, true);

// Inicia o HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - Lucario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="cabecalho"></div>
        <h1>Qual seu Pokémon favorito?</h1>
    </header>
    <div class="pokemon-card">
        <?php
        // Verifica se a resposta foi decodificada corretamente
        if ($transformado):
        ?>

        <!-- Exibe a imagem do Pokémon -->
        <img class="pokemon-image" src="<?= $transformado['sprites']['front_default'] ?>" alt="<?= $transformado['name'] ?>">

        <!-- Exibe o nome do Pokémon -->
        <h2><?= ucfirst($transformado['name']) ?></h1>

        <!-- Exibe os tipos do Pokémon -->
        <ul>
            <?php foreach ($transformado['types'] as $tipo) : ?>
                <li><?= ucfirst($tipo['type']['name']) ?></li>
            <?php endforeach; ?>
        </ul>

        <?php
        else:
            echo "<p>Erro ao obter os dados do Pokémon.</p>";
        endif;
        ?>
    </div>
</body>
</html>



