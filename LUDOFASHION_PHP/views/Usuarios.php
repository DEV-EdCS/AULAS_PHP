<?php

class Usuarios
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Método para listar todos os usuários
    public function listar()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obter um usuário por ID
    public function obterPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um usuário
    public function atualizar($id, $nome, $email, $telefone, $cpf, $nascimento)
    {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, nascimento = :nascimento WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->execute();
    }

    // Método para deletar um usuário por ID
    public function deletar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>
