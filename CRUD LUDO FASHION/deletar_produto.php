<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bd.php';

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Cria a consulta SQL para deletar o produto com o ID especificado
    $sql = "DELETE FROM produtos WHERE id=$id";

    // Executa a consulta e verifica se foi bem-sucedida
    if ($conexao_banco->query($sql) === TRUE) {
        echo "Produto deletado com sucesso";
    } else {
        echo "Erro ao deletar o produto: " . $conexao_banco->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao_banco->close();

    // Redireciona de volta para a página de listagem de produtos
    header("Location: listar_produtos.php");
    exit; // Garante que o script pare de executar após o redirecionamento

} else {
    // Caso o ID não tenha sido passado, exibe uma mensagem de erro
    echo "ID do produto não fornecido.";
}
?>
