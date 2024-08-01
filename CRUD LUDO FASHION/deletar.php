<?php
// Inclui os arquivos de conexão e da classe Carro
require 'conexao.php';
require 'Carro.php';

// Habilita a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cria a conexão com o banco de dados
$conexao = (new Conexao())->conectar();

// Cria uma instância da classe Carro
$carro = new Carro($conexao);

// Obtém o ID do carro a ser deletado
$id = $_GET['id'] ?? null;
if ($id) {
    // Deleta o carro
    $carro->deletar([$id]);
}

// Redireciona para a página inicial
header('Location: index.php');
exit(); // Certifique-se de que o script é encerrado após o redirecionamento
?>
