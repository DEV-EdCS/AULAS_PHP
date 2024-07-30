<?php
// Passo 4 Criar Função para Ler Dados (Read)
// Ler os dados existentes em uma tabela do banco de dados MySQL e exibi-los em uma página web

include 'conexao_bd'; // Utilizar o arquivo de conexão previamente criado (conexao_bd.php)

// Cria a SQL para selecionar os dados
$sql_selecionar_usuarios = "SELECT id_exemplo, nome, email, telefone, cpf FROM usuarios"; // SELECT para selecionar as colunas específicas, FROM seleciona as tabelas 
$resultado_selecionar_usuarios = $conexao_banco->query($sql_selecionar_usuarios); // 'query' É uma solicitação de informações feita ao banco de dados que retorna os resultados
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Lista de Usuários</h2> 
    <table border="1"> <!-- Cria uma tabela para exibir os usuários cadastrados -->
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
        </tr>
        
        <?php // Abre a tag php para verificar os resultados de conexão com o banco de dados
        // Verifica se há resultados
        if ($resultado->num_rows > 0) { // 'num_rows' Obtém o número de linhas no conjunto de resultados. Nesse caso verifica se o resultado obtido é maior que '0'
            // Itera através dos resultados e cria linhas da tabela para cada registro
            while($linha = $resultado->fetch_assoc()) { // 'while' dirá ao PHP para executar as declarações aninhadas repetidamente, enquanto a expressão do while forem avaliadas como true
                // 'fetch_assoc' Obtém a próxima linha do conjunto de resultados como um array associativo

                echo "<tr>"; // Exibe os resultados em uma tabela HTML
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["email"] . "</td>";
                echo "<td>" . $linha["telefone"] . "</td>";
                echo "<td>" . $linha["cpf"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum usuário encontrado</td></tr>"; // Se não houver registros, exibe uma linha indicando que nenhum usuário foi encontrado
        } // 'colspan' tag em HTML para fazer com que uma célula se estenda por várias colunas

        // Fecha a conexão com o banco de dados
        $conexao_banco->close();
        ?>
    </table>
</body>
</html>