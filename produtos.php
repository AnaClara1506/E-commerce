<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecoline</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php session_start(); ?>
    <div class="container">
        <div class="container-imagem">
            <div class="topo">
                <img src="Imagens/Logotipo.png" alt="Logotipo" width="100px" class="logo">
                <div class="menu">
                    <nav>
                        <a href="Sobre.php">Sobre</a>
                        <a href="produtos.php" id="selecionado">Produtos</a>
                        <a href="index.php">Home</a>
                    </nav>
                    <div class="container-botoes">
                        <?php
                            if(isset($_SESSION['sessaoConectado']) && $_SESSION['sessaoConectado'] == true){ 
                                echo "<a href='#' class='button'>Minha Conta</a>";
                                echo "<a href='#' class='button'>Carrinho</a>";
                            }
                            else {
                                echo "<a class='button' id='login'>Login</a>";
                                echo "<div class='menu-login'>
                                        <div class='flex-login'>
                                            <a href='login.html'>Entrar</a>
                                            <a href='#'>Cadastrar</a>
                                        </div>
                                    </div>";
                            }
                        ?>
                    </div>
                </div>
                <div class="menu-hamburguer">
                    <img src="Imagens/menu-icon.png" width="50px">
                </div>
            </div>
        </div>
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
        $(".menu-hamburguer").click(function () {
            $(".menu").toggleClass("active");
        });
        $("#login").click(function () {
            $(".menu-login").toggleClass("active");
        });
    </script>
    </div>
</body>

</html>