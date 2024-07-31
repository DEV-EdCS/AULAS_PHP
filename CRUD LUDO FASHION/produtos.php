<?php 
// Cria uma classe de produtos para acrescentar os atributos
class Produtos{
    // Atributo para armazenar a conexão com o banco de dados
    private $conexao;
    // Construtor da classe que inicializa a conexão
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

       // Método para adicionar um produto no banco de dados
       public function adicionar($nome, $tamanho, $cor, $preco, $descricao) {
        // SQL para inserir um novo produto
        $sql = "INSERT INTO produtos (nome, tamanho, cor, preco, descricao) VALUES (:nome, :tamanho, :cor, :preco, :descricao)";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql); // 'prepare' Prepara uma instrução SQL para execução
        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':nome', $nome); // 'stmt' Representa uma declaração preparada 'bindParam' Vincula um parâmetro ao nome de variável especificado
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':descricao', $descricao);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }
    
}
?>