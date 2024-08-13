<?php
// Inclui os arquivos de conexão e da classe Produtos
require 'conexao.php';
require 'produtos.php';

// Habilita a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cria a conexão com o banco de dados
$conn = (new Conexao())->conectar();

// Cria uma instância da classe Produto
$produto = new Produtos($conn);

// Obtém o ID do produto a ser deletado
$id = $_GET['id'] ?? null;

if ($id) {
    // Valida e escapa o ID para segurança
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        // Deleta o produto
        $produto->deletar([$id]);
    } else {
        echo "ID inválido.";
        exit();
    }
}

// Redireciona para a página inicial
header('Location: views/ProdutosCadastrados.php');
exit(); // Certifica que o script é encerrado após o redirecionamento
?>
