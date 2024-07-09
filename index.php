<?php
// isso é um comentário

/*comentarios
com várias
linhas */

echo "Hello World";
echo "<b> Olá Mundo <b>";

$nome = 'Fulano';
echo "<br>";

define("PI", 3.14); //forma de se fazer const
echo "<br>";

echo PI;
echo "<br>";

echo $nome . "<br>";
echo "<br>";

$corFavorita; //camel case
$cor_favorita; //snake case - MAIS USADA
$CorFavorita; //pascal case

echo "Meu nome é:" . $nome . "<br>";
echo "Meu nome é: $nome\n";

echo "<br>";
echo "<br>";

echo strlen($nome);

echo "<br>";
echo "<br>";

$frutas = array('maça', 'banana', 'manga');

foreach($frutas as $vitamina){
    echo $vitamina . "<br>";
}
echo "<br>";

$idades = array("pedro"=>18, "magno"=>40);
echo $idades['magno'];

foreach($idades as $nome=>$idade){
    echo "$nome tem $idade anos <br>";
}


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