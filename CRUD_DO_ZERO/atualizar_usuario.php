<?php
// Passo 5: Criar Função para Atualizar Dados (Update)
// Permitir a edição de dados existentes em uma tabela do banco de dados MySQL
// Atualizar os dados no banco de dados após o envio do formulário

// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bd.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") { //  Verifica se o formulário foi enviado usando o método POST, indicando que o usuário submeteu os dados do formulário
    // Pega os dados do formulário
    $id_modelo_usuario = $_POST['id_modelo_usuario']; // Cria uma variável para guardar cada campo do formulário (nome, email, telefone, cpf)
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $telefone_usuario = $_POST['telefone_usuario'];
    $cpf_usuario = $_POST['cpf_usuario'];

    // Cria a SQL para atualizar os dados
    $sql_atualizar_usuario = "UPDATE usuarios SET nome='$nome_usuario', email='$email_usuario' telefone='$telefone_usuario' cpf='$cpf_usuario' WHERE id=$id_usuario"; // Cria uma variável para guardar e enviar as informações para o banco de dados, utilizando o comando 'UPDATE' com os valores 'SET/definir' dos formulários

    // Função para executar a SQL e verificar se a inserção foi bem-sucedida
    if ($conexao_banco->query($sql_atualizar_usuario) === TRUE) { // Se foi bem-sucedida, retorna 'TRUE'
        echo "Usuário atualizado com sucesso"; // Exibe a mensagem de êxito na inserção de dados
    } else { // Se ocorrer um erro, exibe uma mensagem de erro junto com a consulta SQL e a mensagem de erro retornada pelo banco de dados
        echo "Erro ao atualizar usuário: " . $sql_atualizar_usuario . "<br>" . $conexao_banco->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao_banco->close();
}

// Pega o ID do usuário a ser editado (pode ser passado via GET)
$id_usuario = $_GET['id'];

// Cria a SQL para selecionar o usuário a ser editado
$sql_selecionar_usuario = "SELECT id_modelo, nome, email, telefone, cpf FROM usuarios WHERE id=$id_usuario"; // 'WHERE' usado para filtrar dados em um comando SQL, nesse caso a tabela 'id_usuario'
$resultado = $conexao_banco->query($sql_selecionar_usuario); // 'query' Se foi bem-sucedida, retorna 'TRUE'

// Verifica se o usuário foi encontrado
if ($resultado->num_rows > 0) {
    // Pega os dados do usuário
    $usuario = $resultado->fetch_assoc(); // 'fecth_assoc' Obtém a próxima linha do conjunto de resultados como um array associativo
} else {
    echo "Usuário não encontrado";
    exit;
}

?>

<!DOCTYPE html>
<html>
<body>
    <h2>Atualizar Usuário</h2>
    <form method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
        Nome: <input type="text" name="nome_usuario" value="<?php echo $usuario['name']; ?>">
        Email: <input type="email" name="email_usuario" value="<?php echo $usuario['email']; ?>">
        Telefone: <input type="number" name="telefone_usuario" value="<?php echo $usuario['telefone']; ?>">
        CPF: <input type="number" name="email_usuario" value="<?php echo $usuario['cpf']; ?>">
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>