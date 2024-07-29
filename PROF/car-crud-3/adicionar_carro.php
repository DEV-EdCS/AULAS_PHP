<?php
require 'GerenciadorCarros.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];

    // Verifica se foi feito upload de uma imagem
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $caminhoFoto = 'uploads/' . $_FILES['foto']['name']; // Define o caminho da imagem
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoFoto); // Move a imagem para o diretório de uploads
    } else {
        $caminhoFoto = null; // Caso não tenha sido enviado uma imagem
    }

    // Instancia o Gerenciador de Carros
    $gerenciadorCarros = new GerenciadorCarros();
    $gerenciadorCarros->adicionarCarro($marca, $modelo, $ano, $cor, $caminhoFoto);

    // Redireciona para a página principal
    header('Location: index.php');
    exit;
}
?>
