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
        $sql = "INSERT INTO produtos (nome, tamanho, cor, preco, descricao) VALUES (:nome, :modelo, :ano, :cor)";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql);
        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':cor', $cor);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }
     id	nome	tamanho	cor	preco	descricao	
}
?>