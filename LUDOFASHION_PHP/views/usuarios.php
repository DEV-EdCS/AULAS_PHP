<?php
class usuarios
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    // Método para adicionar um usuário
    public function adicionar($nome, $email, $senha, $telefone, $cpf, $nascimento)
    {
        $sql = "INSERT INTO usuarios (nome, email, senha, telefone, cpf, nascimento) VALUES (:nome, :email, :senha, :telefone, :cpf, :nascimento)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->execute();
    }

//     // Método para listar todos os usuarios
//     public function listar()
//     {
//         $sql = "SELECT * FROM usuarios";
//         $stmt = $this->conexao->query($sql);
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     // Método para obter um usuario por ID
//     public function obterPorId($id)
//     {
//         $sql = "SELECT * FROM carros WHERE id = :id";
//         $stmt = $this->conexao->prepare($sql);
//         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//         $stmt->execute();
//         return $stmt->fetch(PDO::FETCH_ASSOC);
//     }

//     // Método para atualizar um carro
//     public function atualizar($id, $marca, $modelo, $ano, $cor, $foto)
//     {
//         $sql = "UPDATE carros SET marca = :marca, modelo = :modelo, ano = :ano, cor = :cor, foto = :foto WHERE id = :id";
//         $stmt = $this->conexao->prepare($sql);
//         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//         $stmt->bindParam(':marca', $marca);
//         $stmt->bindParam(':modelo', $modelo);
//         $stmt->bindParam(':ano', $ano);
//         $stmt->bindParam(':cor', $cor);
//         $stmt->bindParam(':foto', $foto);
//         $stmt->execute();
//     }

//     // Método para deletar carros
//     public function deletar($ids)
//     {
//         $ids = implode(',', array_map('intval', $ids));
//         $sql = "DELETE FROM carros WHERE id IN ($ids)";
//         $this->conexao->exec($sql);
//     }
}
?>