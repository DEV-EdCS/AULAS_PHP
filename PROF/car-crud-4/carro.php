<?php
// Declaração da classe Carro
class Carro {
    // Atributo para armazenar a conexão com o banco de dados
    private $conexao;

    // Construtor da classe que inicializa a conexão
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Método para adicionar um carro no banco de dados
    public function adicionar($marca, $modelo, $ano, $cor) {
        // SQL para inserir um novo carro
        $sql = "INSERT INTO carros (marca, modelo, ano, cor) VALUES (:marca, :modelo, :ano, :cor)";
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

    // Método para listar todos os carros do banco de dados
    public function listar() {
        // SQL para selecionar todos os carros
        $sql = "SELECT * FROM carros";
        // Executa a consulta SQL
        $stmt = $this->conexao->query($sql);
        // Retorna todos os resultados da consulta como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para editar um carro no banco de dados
    public function editar($id, $marca, $modelo, $ano, $cor) {
        // SQL para atualizar os dados de um carro específico
        $sql = "UPDATE carros SET marca = :marca, modelo = :modelo, ano = :ano, cor = :cor WHERE id = :id";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql);
        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':cor', $cor);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }

    // Método para deletar carros selecionados
    public function deletar($ids) {
        // SQL para deletar os carros cujos IDs estão no array $ids
        $sql = "DELETE FROM carros WHERE id IN (" . implode(',', $ids) . ")";
        // Prepara a consulta SQL
        $stmt = $this->conexao->prepare($sql);
        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }
}
?>
