<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bd.php';

// Verifica se o ID do usuário a ser excluído foi fornecido
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Cria a SQL para excluir o usuário
    $sql_excluir_usuario = "DELETE FROM usuarios WHERE id=$id_usuario";

    // Executa a SQL e verifica se a exclusão foi bem-sucedida
    if ($conexao_banco->query($sql_excluir_usuario) === TRUE) {
        echo "Usuário excluído com sucesso";
    } else {
        echo "Erro ao excluir usuário: " . $conexao_banco->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao_banco->close();
} else {
    echo "ID do usuário não fornecido";
}
?>

<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bd.php';

// Cria a SQL para selecionar todos os usuários
$sql_selecionar_usuarios = "SELECT id, nome, email, telefone, cpf FROM usuarios";
$resultado = $conexao_banco->query($sql_selecionar_usuarios);
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Ação</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            // Saída dos dados de cada linha
            while($usuario = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>" . $usuario["id"] . "</td>
                        <td>" . $usuario["nome"] . "</td>
                        <td>" . $usuario["email"] . "</td>
                        <td>" . $usuario["telefone"] . "</td>
                        <td>" . $usuario["cpf"] . "</td>
                        <td><a href='excluir_usuario.php?id=" . $usuario["id"] . "'>Excluir</a></td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum usuário encontrado</td></tr>";
        }
        $conexao_banco->close();
        ?>
    </table>
</body>
</html>
