<?php
// config.php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ludo_fashion";

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuração de erros PDO para exceções
} catch (PDOException $e) {
    // Tratamento de erro na conexão
    echo "Erro na conexão: " . $e->getMessage();
    exit(); // Encerra o script em caso de erro
}
?>