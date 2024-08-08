<?php
// Faz a conexão com o banco

try {
    $host = 'localhost'; // Ou o IP do servidor MySQL
    $dbname = 'ludo_fashion'; // Nome do banco de dados
    $username = 'root'; // Nome de usuário do MySQL
    $password = ''; // Senha do MySQL (geralmente vazia no XAMPP)

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    exit(); // Interrompe o script caso a conexão falhe
}

?>