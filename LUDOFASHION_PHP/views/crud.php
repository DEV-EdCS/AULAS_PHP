<?php
session_start();
require 'conexao.php';

// Verificar se o usuário está logado e é um administrador
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Se não for administrador, redirecionar para login
if ($user['perfil'] !== 'administrador') {
    header('Location: Login.php');
    exit();
}

// Processar inclusão de usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inclusão de um novo usuário
    if (isset($_POST['adicionar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = hash('sha256', $_POST['senha']);
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $nascimento = $_POST ['nascimento'];

        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha, telefone, cpf, nascimento, perfil) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$nome, $email, $senha, $telefone, $cpf, $nascimento, 'normal']);
    }

    // Exclusão de usuários selecionados
    if (isset($_POST['excluir'])) {
        $ids = $_POST['ids'];
        $ids = implode(',', array_map('intval', $ids));
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id IN ($ids)");
        $stmt->execute();
    }

    // Edição de informações de um usuário
    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];

        $stmt = $pdo->prepare('UPDATE usuarios SET email = ?, senha = ?, telefone = ? WHERE id = ?');
        $stmt->execute([$email, $senha, $telefone, $id]);
    }
}