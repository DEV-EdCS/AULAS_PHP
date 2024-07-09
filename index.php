<?php
// isso é um comentário

/*comentarios
com várias
linhas */

echo "Hello World";
echo "<b> Olá Mundo <b>";

$nome = 'Fulano';
define("PI", 3.14); //forma de se fazer const

echo PI;
echo $nome . "<br>";

$corFavorita; //camel case
$cor_favorita; //snake case - MAIS USADA
$CorFavorita; //pascal case

echo "Meu nome é:" . $nome . "<br>";
echo "Meu nome é: $nome\n";

echo strlen($nome)

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula PHP</title>
</head>
<body>
    <h1>Olá Mundo</h1>
</body>
</html>