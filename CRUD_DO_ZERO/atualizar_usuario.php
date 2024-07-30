<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bd.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $id_usuario = $_POST['id_usuario']; // ID do usuário a ser atualizado
    $nome_usuario = $_POST['nome_usuario']; // Nome do usuário
    $email_usuario = $_POST['email_usuario']; // Email do usuário
    $telefone_usuario = $_POST['telefone_usuario']; // Telefone do usuário
    $cpf_usuario = $_POST['cpf_usuario']; // CPF do usuário

    // Cria a SQL para atualizar os dados
    $sql_atualizar_usuario = "UPDATE usuarios SET nome='$nome_usuario', email='$email_usuario', telefone='$telefone_usuario', cpf='$cpf_usuario' WHERE id=$id_usuario"; // Consulta SQL para atualizar dados

    // Executa a SQL e verifica se a atualização foi bem-sucedida
    if ($conexao_banco->query($sql_atualizar_usuario) === TRUE) {
        echo "Usuário atualizado com sucesso";
    } else {
        echo "Erro ao atualizar usuário: " . $conexao_banco->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao_banco->close();
    exit;
}

// Verifica se o ID do usuário a ser editado foi passado via GET
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Cria a SQL para selecionar o usuário a ser editado
    $sql_selecionar_usuario = "SELECT id, nome, email, telefone, cpf FROM usuarios WHERE id=$id_usuario"; // Consulta SQL para selecionar o usuário

    $resultado = $conexao_banco->query($sql_selecionar_usuario);

    // Verifica se o usuário foi encontrado
    if ($resultado->num_rows > 0) {
        // Pega os dados do usuário
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "Usuário não encontrado";
        exit;
    }
} else {
    echo "ID do usuário não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Atualizar Usuário</h2>
    <?php if (isset($usuario)): ?>
    <form method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
        Nome: <input type="text" name="nome_usuario" value="<?php echo $usuario['nome']; ?>">
        Email: <input type="email" name="email_usuario" value="<?php echo $usuario['email']; ?>">
        Telefone: <input type="text" name="telefone_usuario" value="<?php echo $usuario['telefone']; ?>">
        CPF: <input type="text" name="cpf_usuario" value="<?php echo $usuario['cpf']; ?>">
        <input type="submit" value="Atualizar">
    </form>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>
</body>
</html>
