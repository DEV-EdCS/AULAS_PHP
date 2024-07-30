<?php
// PASSO 3
// Agora é preciso Criar uma Função no php para Inserir Dados (Create) no banco
// Criar um formulário HTML para coletar dados do usuário (nome, email, telefone e cpf)
// Inserir esses dados no banco de dados MySQL ao enviar o formulário

// Inclui o arquivo de conexão (PASSO 2) com o banco de dados
include 'conexao_bd.php';

// Cria uma função para verificar se o formulário presente no html foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") { //  Verifica se o formulário foi enviado usando o método POST, indicando que o usuário submeteu os dados do formulário
    // Pega os dados do formulário
    $nome_usuario = $_POST['nome_usuario']; // Cria uma variável para guardar cada campo do formulário (nome, email, telefone, cpf)
    $email_usuario = $_POST['email_usuario'];
    $telefone_usuario = $_POST['telefone_usuario'];
    $cpf_usuario = $_POST['cpf_usuario'];

    // Cria a SQL para inserir os dados 
    $sql_inserir_usuario = "INSERT INTO usuarios (nome, email, telefone, cpf) VALUES ('$nome_usuario', '$email_usuario' '$telefone_usuario', '$cpf_usuario')"; // Cria uma variável para guardar e enviar as informações para o banco de dados, utilizando o comando 'INSERT INTO' com os valores 'VALUES' dos formulários
    
    // Função para executar a SQL e verificar se a inserção foi bem-sucedida
    if ($conexao_banco->query($sql_inserir_usuario) === TRUE) { // 'query' Se foi bem-sucedida, retorna 'TRUE'
        echo "Novo usuário adicionado com sucesso"; // Exibe a mensagem de êxito na inserção de dados
    } else { // Se ocorrer um erro, exibe uma mensagem de erro junto com a consulta SQL e a mensagem de erro retornada pelo banco de dados
        echo "Erro ao adicionar usuário: " . $sql_inserir_usuario . "<br>" . $conexao_banco->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao_banco->close();
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Adicionar Usuário</h2>
    <form method="post"> <!-- Define o formulário que usa o método POST para enviar dados --> 
        Nome: <input type="text" name="nome_usuario"> <!-- Campo de texto para o nome do usuário --> 
        Email: <input type="email" name="email_usuario"> <!-- Campo de email para o email do usuário --> 
        Telefone: <input type="number" name="telefone_usuario"> <!-- Campo de telefone para o telefone do usuário -->
        CPF: <input type="number" name="cpf_usuario"> <!-- Campo de cpf para o cpf do usuário -->
        
        <input type="submit" value="Adicionar"> <!-- Botão de submissão para enviar o formulário --> 
    </form>
</body>
</html>
