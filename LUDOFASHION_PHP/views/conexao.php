<?php
// Declaração da classe Conexao

class Conexao {
    private $host;
    private $dbname;
    private $usuario;
    private $senha;
    
    // Construtor para inicializar a conexão
    public function __construct($host = 'localhost', $dbname = 'ludo_fashion', $usuario = 'root', $senha = '') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }
    
    // Método para conectar ao banco de dados
    public function conectar() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->usuario, $this->senha);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            // Log de erro (recomendado para produção)
            error_log('Erro de conexão: ' . $e->getMessage());
            // Mensagem genérica para o usuário
            echo 'Não foi possível conectar ao banco de dados.';
            exit(); // Encerra o script em caso de falha
        }
    }
}
?>
