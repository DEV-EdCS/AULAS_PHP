<?php 
// PASSO 2
// Depois de criar o banco de dados é preciso configurar a conexão com o php
class Conexao {
// Configurações de conexão
private $host = "localhost"; // Cria uma variável no php para se comunicar com o servidor local do banco de dados
private $usuario = "root"; // Para exemplo vamos usar o usuário administrador padrão "root" do MySQL
private $senha = ""; // Senha do usuário root (vazia no ambiente de desenvolvimento)
private $nome_banco = "ludo_fashion"; // Nome do banco de dados que foi criado

// Método para conectar ao banco de dados
public function conectar() {
    $this->conn = null;
    try {
        // Cria uma nova instância de PDO para a conexão com o banco de dados
        $conexao = new PDO("mysql:host=$this->host; dbname=$this->nome_banco", $this->usuario, $this->senha);
        // Define o modo de erro do PDO para exceções
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Retorna a conexão
        return $conexao;
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        echo 'Erro: ' . $e->getMessage();
    }
}
}
?>