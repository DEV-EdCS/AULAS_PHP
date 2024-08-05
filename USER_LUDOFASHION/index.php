<?php
session_start();
require 'config.php';

// Verificar login do usuário
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Buscar informações do usuário
    $stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    // Redirecionar para a página de dashboard com base no perfil
    if ($user['perfil'] === 'administrador') {
        header('Location: dashboard_admin.php');
    } else {
        header('Location: dashboard_normal.php');
    }
    exit();
} else {
    // Redirecionar para a página de login
    header('Location: login.php');
    exit();
}
?>
