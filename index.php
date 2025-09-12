<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecoline LTDA</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php session_start(); ?>
    <?php include 'cabecalho.php' ?>
</head>

<body>
    <div class="container">
        <div class="fade-in-text">
            <br>
            <h1>Bem vindo ao nosso site!</h1>
            <br>
            <article>
                <h3 class="fade-in-text">
                    Aqui você encontra produtos sustentáveis para o seu dia a dia! Nossos cadernos ecológicos são todos feitos à mão, 
                    com qualidade e excelência para nossos clientes. Eles foram estilizados e projetados de forma renovável para a venda,
                    com o objetivo de auxiliar no desenvolvimento de um cotidiano sustentável, onde você cria sem danificar o meio ambiente.
                </h3>
            </article>
            <br>
        </div>
        <h2 class="fade-in-text; tag">Nossos produtos</h2><br><br>
        <div class="comercio">
            <div class="tag" id="produtos">
                <img src="Imagens/caderno_modelo1.jpg" alt="">
                <p>Caderno modelo 1</p>
                <p class="preco">R$20,00</p><br>
                <a href="produtos.php" class="button">Ver produto</a>
            </div>

            <div class="tag" id="produtos">
                <img src="Imagens/caderno_modelo2.jpg" alt="">
                <p>Caderno modelo 2</p>
                <p class="preco">R$20,00</p><br>
                <a href="produtos.php" class="button">Ver produto</a>
            </div>
            <div class="tag" id="produtos">
                <img src="Imagens/caderno_modelo3.jpg" alt="">
                <p>Caderno modelo 3</p>
                <p class="preco">R$20,00</p><br>
                <a href="produtos.php" class="button">Ver produto</a>
            </div>
        </div>
        <br><br><br>
        <?php include("rodape.php") ?>
    </div>
    <script>
        $(document).ready(function () {
            $(".tag").addClass("visible");
        });
    </script>
</body>

</html>