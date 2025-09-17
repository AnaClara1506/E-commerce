<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gerenciar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php session_start(); ?>
    <?php include 'cabecalho.php' ?>
</head>

<body>
    <div class="container">
        <div class="fade-in-text">
            <br>
            <h1>Bem vindo Administrador!</h1>
            <br>
            <div class='menu-crud'>
                <a href='crudUsuarios.php' class="texto-crud">Crud Usuário</a><br><br>
                <a href='crudProdutos.php' class="texto-crud">Crud Produtos</a>
            </div>
        </div>
        <br><br><br>
        <?php include("rodape.php") ?>
    </div>
    <script src="js/script.js"></script>
</body>

</html>