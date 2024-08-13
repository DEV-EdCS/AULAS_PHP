<?php
session_start();
require 'conexao.php'; // Inclui a conexão com o banco de dados
require 'Usuarios.php'; // Inclui o arquivo que contém a classe Usuarios

$conn = (new Conexao())->conectar();

if ($conn === null) {
    die("Erro ao conectar com o banco de dados");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Após deletar o usuário, desloga e redireciona para a página inicial
        session_destroy();
        header('Location: Login.php');
        exit();
    } catch (PDOException $e) {
        echo "Erro ao deletar o usuário: " . $e->getMessage();
    }
}
?>

