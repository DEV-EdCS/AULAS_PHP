<?php
session_start();
require 'views/conexao.php';

// Verificar se o usuário está logado e é um administrador
if (!isset($_SESSION['user_id'])) {
    header('views/Login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$conn = (new Conexao())->conectar();
$pdo = $conn;

$stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Se não for administrador, redirecionar para login
if ($user['perfil'] !== 'administrador') {
    header('Location: views/Login.php');
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
        $ids = array_map('intval', $ids); // Sanitiza os IDs
        $placeholders = implode(',', array_fill(0, count($ids), '?')); // Prepara os placeholders
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id IN ($placeholders)");
        $stmt->execute($ids); // Passa os IDs como parâmetros
    }

    // Edição de informações de um usuário
    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $senha = isset($_POST['senha']) ? hash('sha256', $_POST['senha']) : null; // Verifica se a senha foi fornecida
        $telefone = $_POST['telefone'];

        $query = 'UPDATE usuarios SET email = ?, telefone = ?';
        $params = [$email, $telefone];

        if ($senha !== null) {
            $query .= ', senha = ?';
            $params[] = $senha;
        }

        $query .= ' WHERE id = ?';
        $params[] = $id;

        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
    }
}
?>