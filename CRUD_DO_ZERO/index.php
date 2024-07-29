<?php 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste CRUD</title>
   <style href="../CRUD_DO_ZERO/style.css"></style>
</head>
<body>
    <form action="crud">
    <h1>Insira Seus Dados</h1>
        <div class="formulario">
        <label for="nome">Nome:</label>
        <input type="text" require name="Nome">

        <label for="email">Email:</label>
        <input type="text" require name="Email">

        <label for="cpf">CPF:</label>
        <input type="password" require name="CPF">

        <label for="telefone">Telefone:</label>
        <input type="number" require name="Telefone">

        <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>