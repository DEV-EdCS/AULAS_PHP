<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'Carro.php';

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();
// Cria uma instância da classe Carro
$carro = new Carro($conexao);

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];

    // Adiciona o carro no banco de dados
    $carro->adicionar($marca, $modelo, $ano, $cor);
    // Redireciona para a página inicial
    header('Location: index.php');
}
?>
