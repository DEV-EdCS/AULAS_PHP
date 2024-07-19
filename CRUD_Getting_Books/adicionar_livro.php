<?php
require 'Livro.php';
require 'GerenciadorLivros.php';

// Verifica se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $editora = $_POST['editora'];
    $ano = $_POST['ano'];
    $isbn = $_POST['isbn'];
    $cadastrado = $_POST['cadastrado'];
    $estado = $_POST['estado'];

    // Verifica se foi feito upload de uma imagem
   /* if ($_FILES['capa']['error'] === UPLOAD_ERR_OK) {
        $caminhoCapa = 'uploads/' . $_FILES['foto']['name']; //Define o caminho da imagem
        move_uploaded_file($_FILES['capa']['tmp_name'], $caminhoCapa); // Move a imagem para o diretório de uploads
    } else {
        $caminhoCapa = null; // Caso não tenha sido enviada a imagem
    }
    // $caminhoCapa = $_POST['capa'];*/

    // Cria um novo objeto Livro
    $livro = new Livro($titulo, $sinopse, $editora, $ano, $isbn, $cadastrado, $estado/*, $caminhoCapa*/);

    // Gerencia o CRUD usando GerenciadorLivros
    $GerenciadorLivros = new GerenciadorLivros();
    $GerenciadorLivros->adicionarLivro($livro);

    // Redireciona para a página principal
    header('Location: index.php');
    exit;
}
?>