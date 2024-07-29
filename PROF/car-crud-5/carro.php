<?php
class Carro
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    // Método para adicionar um carro
    public function adicionar($marca, $modelo, $ano, $cor, $foto)
    {
        $sql = "INSERT INTO carros (marca, modelo, ano, cor, foto) VALUES (:marca, :modelo, :ano, :cor, :foto)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':foto', $foto);
        $stmt->execute();
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
