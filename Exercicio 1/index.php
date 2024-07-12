<?php 

echo "Questão 1";
echo "<br>";
/*Exiba na tela as variáveis nome, idade, endereco e curso fazendo a concatenação dos valores dentro do seguinte texto.
a. “Ola eu sou Fulano, tenho XX anos, moro em XYZ e faço o curso de ZZZ no SENAC”*/
$banda = 'Iron Maiden';
echo $banda;
echo "<br>";
echo "<br>";



echo "Questão 2";
echo "<br>";
//Crie uma variável em PHP, atribua um valor e exiba na página.
$nome = 'Edlan';
$idade = 27;
$endereco = 'Rua Telmo Mendes';
$curso = 'Design/Programador Web';

echo "Olá eu sou $nome, tenho $idade anos, moro em $endereco e faço o curso de $curso no SENAC";
echo "<br>";
echo "<br>";



echo "Questão 3";
echo "<br>";
/*Faça um programa que leia 2 variáveis e exiba na tela: soma, subtração,
multiplicação e divisão.*/
$variavel_1 = 8;
$variavel_2 = 4;

// Realização das operações matemáticas
$soma = $variavel_1 + $variavel_2;
$subtracao = $variavel_1 - $variavel_2;
$multiplicacao = $variavel_1 * $variavel_2;
$divisao = $variavel_1 / $variavel_2;

// Exibição dos resultados
echo "Soma: $soma<br>";
echo "Subtração: $subtracao<br>";
echo "Multiplicação: $multiplicacao<br>";
echo "Divisão: $divisao<br>";
echo "<br>";



echo "Questão 9";
echo "<br>";
/*Percorra o array abaixo e exiba o nome e a nota dos aprovados (nota maior ou igual a 7). */
$alunos = array(
    'Junior' => 9.5,
    'Maria' => 10,
    'Paulo' => 6,
    'Ana' => 8.5,
    'Pedro' => 5.5,
    'Julia' =>6.5
);

foreach ($alunos as $nome => $nota) { //foreach serve para iterar sobre o array $alunos
    if ($nota >= 7) {// Se a nota do aluno é maior ou igual a 7
        echo "Nome: " . $nome . ", Nota: " . $nota . "<br>";  // Exibe o nome e a nota dos alunos aprovados
    }
}

?>