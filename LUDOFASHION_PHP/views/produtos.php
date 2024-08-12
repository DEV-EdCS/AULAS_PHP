<?php
class Produtos
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Método para adicionar um produto
    public function adicionar($nome, $cor, $tamanho, $descricao, $foto) // Cria as variáveis para armazenar os dados do formulário
    {
        $sql = "INSERT INTO produtos (nome, cor, tamanho, descricao, foto) VALUES (:nome, :cor, :tamanho, :descricao, :foto)"; // insere na tabela produtos os valores das colunas
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':foto', $foto);
        $stmt->execute();
    }

    // Método para listar todos os produtos
    public function listar()
    {
        $sql = "SELECT * FROM produtos"; // Seleciona todos os dados da tabela 'produtos' no bd 
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // 'fetchAll' Busca as linhas remanescentes de um conjunto de resultados
    }

    // Método para obter um produto por ID
    public function obterPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id"; // Seleciona todos os dados da tabela 'produtos' com 'id = a determinado id' no bb
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um produto
    public function atualizar($id, $nome, $cor, $tamanho, $descricao, $foto)
    {
        $sql = "UPDATE produtos SET nome = :nome, cor = :cor, tamanho = :tamanho, descricao = :descricao, foto = :foto WHERE id = :id"; // Atualiza os dados da tabela produtos utilizando o UPDATE através do ID específico 
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':foto', $foto);
        $stmt->execute();
    }

    // Método para deletar produtos
    public function deletar($ids)
    {
        // Sanitiza IDs
        $ids = array_map('intval', $ids);
        $ids = implode(',', $ids);

        // Usa uma query preparada para evitar SQL Injection
        $sql = "DELETE FROM produtos WHERE id IN ($ids)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
?>
