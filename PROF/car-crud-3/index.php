<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Carros</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="estilo.css">
    <!-- Inclui o CSS do Lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
</head>
<body>
    <div class="container">
        <!-- Card para organizar o conteúdo -->
        <div class="card mt-5">
            <div class="card-header text-center">
                <h1 class="my-4">CRUD de Carros</h1>
            </div>
            <div class="card-body">
                <!-- Formulário para adicionar carros -->
                <form action="adicionar_carro.php" method="POST" class="mb-4" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" required>
                    </div>
                    <div class="form-group">
                        <label for="ano">Ano:</label>
                        <input type="number" class="form-control" id="ano" name="ano" required>
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor:</label>
                        <input type="text" class="form-control" id="cor" name="cor" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar Carro</button>
                    <button type="submit" form="form-deletar" class="btn btn-danger">Deletar Selecionados</button>
                </form>
                <h2 class="mb-4">Lista de Carros</h2>
                <!-- Formulário para deletar carros -->
                <form id="form-deletar" action="deletar_carros.php" method="POST">
                    <div id="lista-carros">
                        <!-- Inclui o script para listar os carros -->
                        <?php include 'listar_carros.php'; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Inclui scripts do Bootstrap e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inclui o script do Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
