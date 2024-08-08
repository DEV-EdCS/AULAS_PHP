<?php
// logout.php

session_start(); // Inicia a sessão
session_destroy(); // Destroi todas as variáveis da sessão
header('Location: Login.php'); // Redireciona para a página de login
exit();
?>