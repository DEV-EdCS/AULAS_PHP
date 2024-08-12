<?php 

class Usuarios
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Método para listar todos os usuarios
    public function listar()
    {
        $sql = "SELECT * FROM usuarios"; // Seleciona todos os dados da tabela 'usuarios' no bd 
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // 'fetchAll' Busca as linhas remanescentes de um conjunto de resultados
    }

    // Método para obter um usuario por ID
    public function obterPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id"; // Seleciona todos os dados da tabela 'usuarios' com 'id = a determinado id' no bb
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];


    // Método para atualizar um usuario
    public function atualizar($id, $nome, $email, $telefone, $cpf, $nascimento)
    
    {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, nascimento = :nascimento WHERE id = :id"; // Atualiza os dados da tabela 'usuarios' utilizando o UPDATE através do ID específico 
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->execute();
    }

    // Atualiza os dados do produto no banco de dados
    $produto->atualizar($id, $nome, $email, $telefone, $cpf, $nascimento);

    // Redireciona para a página inicial
    header('Location: MeuPerfil.php');
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
}
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - LudoFashion</title>
    <link rel="stylesheet" href="../css/EditarUser.css">
</head>

<?php include '../views/header.php'; ?>

<nav>

    <a href="">Catálogo</a>

    <a href="">Sobre a Loja</a>

</nav>

<body>
    <section class="lista">
        <div class="part1">
            <div class="options1">
                <a href=""><img src="../imgs/Icon_user.png" alt="" width="40px"></a>
                <a href="" title="Minha Conta"><b>Minha Conta</b></a>
            </div>
            <div class="options2">
                <a href=""><img src="../imgs/icon_favorite.png" alt="" width="40px"></a>
                <a href="ListadeDesejo.php" title="Lista de Desejos"><b>Lista de Desejos</b></a>
            </div>
            <div class="options3">
                <a href=""><img src="../imgs/icon_categorias.png" alt="" width="40px"></a>
                <a href="" title="Categorias"><b>Categorias</b></a>
            </div>
            <div class="options4">
                <a href=""><img src="../imgs/icon_invetario.png" alt="" width="40px"></a>
                <a href="" title="Produtos"><b>Produtos</b></a>
            </div>
        </div>
        <div class="part2">
            <div class="titulo">
                <h1>Meu Perfil</h1>
                <p>Gerenciar e proteger sua conta</p>
            </div>

            <form action="EditarUser.php?id=<?= bindParam($id) ?>" method="post" class="conteudo">
            <div class="question">
                    <label for="nome">Nome:</label>
                    <label for="email">Email:</label>
                    <label for="phone">Número de telefone:</label>
                    <label for="cpf">CPF:</label>
                    <label for="nascimento">Data de Nascimento</label>
                </div>
                <div class="resposta">
                    <input type="text" name="nome" id="nome" value="<?= bindParam(':nome', $nome); ?>; <?php echo $row['nome']; ?>" readonly>

                    <input type="text" name="email" id="email" value="<?= bindParam(':email', $email); ?>; <?php echo $row['email']; ?>" required placeholder="Seu email aqui">

                    <input type="tel" name="telefone" id="telefone" value="<?= bindParam(':telefone', $telefone); ?>; <?php echo $row['telefone']; ?>" required placeholder="(xx) xxxxx-xxxx">

                    <input type="number" name="cpf" id="cpf" value="<?= bindParam(':cpf', $cpf); ?>; <?php echo $row['cpf']; ?>" readonly>

                    <input type="date" name="nascimento" id="nascimento" value="<?= bindParam(':nascimento', $nascimento); ?>; <?php echo $row['nascimento']; ?>" readonly>

                </div>
                <div class="modificar">
                    <input class="btn-envia" type="submit" value="Gravar">
                </div>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>

</html>