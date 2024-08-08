<?php
// Configurações do banco de dados
define ("DRIVE", "mysql");
define ("NOME_DO_BANCO", "ludo_fashion");
define ("LOCAL_DO_BANCO", "localhost");
define ("CHARSET", "UTF8");
define ("USUARIO", "root");
define ("SENHA", "");

// Conexao com o banco de dados
class Conexao { // Responsável por criar as conexoes com o banco
    public static function conectar(){
        $conn = new PDO(DRIVE . ":host=" . LOCAL_DO_BANCO . ";dbname=" . NOME_DO_BANCO . ";charset=" . CHARSET , USUARIO, SENHA);
        //Configuração dos erros que podem acontecer
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //ATT_ERRMODE = atributo modo de erro do pdo é alterado para o ERRMODE_EXCEPTION= modo de excessoes, para o proprio PDO fornecer mais detalhes sobre algum tipo de erro
        return $conn;
    }
}
?>