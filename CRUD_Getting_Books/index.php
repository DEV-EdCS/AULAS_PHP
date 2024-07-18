<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Adicionar Livro</h1>
    <form action="adicionar_livro.php" method="post">
       <label for="titulo">Título: </label>
       <input type="text" id="titulo" name="titulo" placeholder="Insira o título" required><br><br>

        <label for="sinopse">Sinopse: </label>
        <input type="text" id="sinopse" name="sinopse" placeholder="Insira a sinopse" required><br><br>
        
        <label for="editora">Editora: </label>
        <input type="text" id="editora" name="editora" placeholder="Qual a editora?" required><br><br>
        
        <label for="ano">Ano: </label>
        <input type="month" id="ano" name="ano" required><br><br>

        <label for="isbn">ISBN: </label>
        <input type="text" id="isbn" name="isbn" placeholder="Insira o código ISBN" require><br><br>

        <label for="cadastrado">Cadastrado em: </label>
        <input type="date" id="cadastrado" name="cadastrado" required><br><br>

        <label for="estado">Estado de conservação: </label>
        <input type="text" id="estado" name="estado" placeholder="Descreva o estado atual do livro" required><br><br>

        <label for="caminhoCapa">Capa: </label>
        <input type="file"  id="caminhoCapa" name="caminhoCapa" require><br><br>
        
        <input type="submit" value="Adicionar Livro">
    </form>
    <h2>Livros Cadastrados</h2>
    <div id="lista-livros">
        <?php include 'listar_livros.php' //inclui as informações cadastradas aqui ?>
    </div>

</body>
</html>