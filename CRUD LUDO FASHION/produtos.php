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
    
      // Método para listar todos os carros
    public function listar()
    {
        $sql = "SELECT * FROM carros";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obter um carro por ID
    public function obterPorId($id)
    {
        $sql = "SELECT * FROM carros WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um carro
    public function atualizar($id, $marca, $modelo, $ano, $cor, $foto)
    {
        $sql = "UPDATE carros SET marca = :marca, modelo = :modelo, ano = :ano, cor = :cor, foto = :foto WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':foto', $foto);
        $stmt->execute();
    }

    // Método para deletar carros
    public function deletar($ids)
    {
        $ids = implode(',', array_map('intval', $ids));
        $sql = "DELETE FROM carros WHERE id IN ($ids)";
        $this->conexao->exec($sql);
    }

     // Método para listar todos os carros
     public function listar()
     {
         $sql = "SELECT * FROM carros";
         $stmt = $this->conexao->query($sql);
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
 
     // Método para obter um carro por ID
     public function obterPorId($id)
     {
         $sql = "SELECT * FROM carros WHERE id = :id";
         $stmt = $this->conexao->prepare($sql);
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);
     }
 
     // Método para atualizar um carro
     public function atualizar($id, $marca, $modelo, $ano, $cor, $foto)
     {
         $sql = "UPDATE carros SET marca = :marca, modelo = :modelo, ano = :ano, cor = :cor, foto = :foto WHERE id = :id";
         $stmt = $this->conexao->prepare($sql);
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->bindParam(':marca', $marca);
         $stmt->bindParam(':modelo', $modelo);
         $stmt->bindParam(':ano', $ano);
         $stmt->bindParam(':cor', $cor);
         $stmt->bindParam(':foto', $foto);
         $stmt->execute();
     }
 
     // Método para deletar carros
     public function deletar($ids)
     {
         $ids = implode(',', array_map('intval', $ids));
         $sql = "DELETE FROM carros WHERE id IN ($ids)";
         $this->conexao->exec($sql);
     }
 }
 ?>
}
?>