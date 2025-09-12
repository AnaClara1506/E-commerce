<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecoline</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php session_start(); ?>
    <?php include 'cabecalho.php' ?>
</head>

<body>
    <div class="container">
        <br><h1>Conheça nossos produtos!</h1>
        <div class="imagem-produtos">
        <figure>
          <img src="Imagens/caderno_modelo2.jpg" alt="Caderno" class="fade-in-text">
          <figcaption>Cadernos EcoLine</figcaption>
        </figure>
        </div><br><br><br>
        <div class ="container-produtos"></div>
            <div class="container-textos">
                <h2 class="texto">Modelo 1</h2>
                <h2 class="texto">Modelo 2</h2>
                <h2 class="texto">Modelo 3</h2>
            </div>
            <div class="container-modelos">
                <div class="imagem-menor">
                    <figure>
                    <img src="Imagens/caderno_modelo1.jpg" alt="Caderno 1" class="fade-in-text">
                    <figcaption>Cadernos EcoLine</figcaption>
                    </figure>
                </div>
                <div class="imagem-menor">
                    <figure>
                    <img src="Imagens/caderno_modelo2.jpg" alt="Caderno 2" class="fade-in-text">
                    <figcaption>Cadernos EcoLine 2</figcaption>
                    </figure>
                </div>
                <div class="imagem-menor">
                    <figure>
                    <img src="Imagens/caderno_modelo3.jpg" alt="Caderno 3" class="fade-in-text">
                    <figcaption>Cadernos EcoLine 3</figcaption>
                    </figure>
                </div>
            </div>
            <div class ="button-produtos">
                <a href='#' class='button'>Adicionar ao Carrinho</a>
                <a href='#' class='button'>Adicionar ao Carrinho</a>
                <a href='#' class='button'>Adicionar ao Carrinho</a>
            </div>
        </div>
        <br><br>
        <?php include("rodape.php") ?>
    </div>
    <script>
        $(document).on("scroll", function () {
            var pageTop = $(document).scrollTop();
            var pageBottom = pageTop + $(window).height();
            var tags = $(".tag");

            for (var i = 0; i < tags.length; i++) {
                var tag = tags[i];
                if ($(tag).position().top < pageBottom) {
                    $(tag).addClass("visible");
                } else {
                    $(tag).removeClass("visible");
                }
            }
        });
    </script>
</body>

</html>