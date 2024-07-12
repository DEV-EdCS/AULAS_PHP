<?php 

echo "Questão 1";
echo "<br>";
/*1. Crie uma variável em PHP, atribua um valor e exiba na página.*/
$banda = "Iron Maiden";
echo $banda;
echo "<br>";
echo "<br>";



echo "Questão 2";
echo "<br>";
/*2. Exiba na tela as variáveis nome, idade, endereco e curso fazendo a concatenação dos valores dentro do seguinte texto.
a. “Ola eu sou Fulano, tenho XX anos, moro em XYZ e faço o curso de ZZZ no SENAC”*/
$nome = 'Edlan';
$idade = 27;
$endereco = 'Rua Telmo Mendes';
$curso = 'Design/Programador Web';

echo "Olá eu sou $nome, tenho $idade anos, moro em $endereco e faço o curso de $curso no SENAC";
echo "<br>";
echo "<br>";



echo "Questão 3";
echo "<br>";
/*3. Faça um programa que leia 2 variáveis e exiba na tela: soma, subtração, multiplicação e divisão.*/
$variavel_1 = 8;
$variavel_2 = 4;

//Realização das operações matemáticas
$soma = $variavel_1 + $variavel_2;
$subtracao = $variavel_1 - $variavel_2;
$multiplicacao = $variavel_1 * $variavel_2;
$divisao = $variavel_1 / $variavel_2;

//Exibição dos resultados
echo "Soma: $soma<br>";
echo "Subtração: $subtracao<br>";
echo "Multiplicação: $multiplicacao<br>";
echo "Divisão: $divisao<br>";
echo "<br>";



echo "Questão 4";
/* 4. Faça um programa que leia 2 números e exiba quem é maior, menor ou se eles são iguais.*/
echo "<br>";

$num1 = 3;
$num2 = 5;
/*
function comparativo($num1, $num2){
if ($num1 > $num2) {{
    echo "$num1 é maior que $num2"};{
    else ($num1 < $num2) };{
        echo "$num1 é menor que $num2"};{
            else ($num1 === $num2) {
                echo "$num1 é igual a $num2"
            } ;
        };
}};*/
echo "<br>";



echo "<br>";
echo "Questão 5 <br>";
echo "<br>";
/* 5. Faça um programa que leia uma string e verifique se ela contém as letras ‘a’ e ‘o’. Caso sim escreva “Contem”, caso contrário escreva “Nao Contem”.
a. Dica: use a função do php str_contains() que recebe como argumentos a string a ser lida e o valor a ser procurado.*/

/*$vogais = "inconstitucionalissimamente"
if (str_contains($vogais ['inconstitucionalissimamente'], 'a', 'o')){
    echo "Contém"
    else 
    echo "Não contém"
};*/
echo "<br>";



echo "<br>";
echo "Questão 9";
echo "<br>";
/*9. Percorra o array abaixo e exiba o nome e a nota dos aprovados (nota maior ou igual a 7).*/
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
echo "Nome: " . $nome . ", Nota: " . $nota . "<br>"; //Exbie o nome e a nota dos alunos aprovados
}
}



echo "<br>";
echo "Questão 10 <br>";
/*10. Crie uma função que calcule a área de um círculo. Fórmula: a = pi * raio².
Valor teste raio = 4, área ~ 50.27 */
/*
$areaCirculo();
$PI = '3,14';
$raio;
*/
/*
$function($calcularArea = );
*/

?>