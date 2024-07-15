<?php
// Define a URL da PokéAPI para obter os dados do Lucario
$url = "https://pokeapi.co/api/v2/pokemon/lucario";

// Obtém a resposta da URL
$resposta = file_get_contents($url);// Lê o arquivo inteiro em uma string

//JSON = Notação de Objeto JavaScript

// Decodifica a resposta JSON para um array associativo
// json_decode — Decodifica uma string JSON
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
        <div class="fundo" width="100%">
            <img src="pokemon_logo.png" alt="" class=pokemon-logo width ="40%">
        </div>
   
    <h1>Qual seu Pokémon favorito?</h1>

    <div class="pokemon-card">
        <?php
        // Verifica se a resposta foi decodificada corretamente
        if ($transformado):
        ?>

        <!-- Exibe a imagem do Lucario -->
        <img class="pokemon-image" src="<?= $transformado['sprites']['front_default'] ?>" alt="<?= $transformado['name'] ?>">

        <!-- Exibe o nome do Pokémon -->
        <h2><?= ucfirst($transformado['name']) ?></h1> <!-- ucfirst — Torna o primeiro caractere de uma string maiúsculo -->

        <!-- Para exibir os tipos Lutador e Metal -->
        <ul> <!-- ul e li usados para entregar os tipos em forma de lista -->
            <!-- Itera sobre os arrays usando foreach-->
            <?php foreach ($transformado['types'] as $tipo) : ?>
                <li><?= ucfirst($tipo['type']['name']) ?></li><!-- ucfirst — Torna o primeiro caractere de uma string maiúsculo -->
            <?php endforeach; ?> <!--Encerra a chave com o fechamento endforeach-->
        </ul>

        <?php /*Caso der erro no caminho, aparece a mensagem de erro*/
        else:
            echo "<p>Erro ao obter os dados do Pokémon.</p>";
        endif; //Encerra a chave com o fechamento endif
        ?>
    </div>
</body>
</html>



