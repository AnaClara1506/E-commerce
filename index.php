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
                        <a href="produtos.php">Produtos</a>
                        <a href="index.php">Home</a>
                    </nav>
                    <div class="container-botoes">
                        <?php
                            if(isset($_SESSION['sessaoConectado']) && $_SESSION['sessaoConectado'] == true){ 
                                echo "<a href='#' class='button'>Minha Conta</a>";
                                echo "<a href='#' class='button'>Carrinho</a>";
                            }
                            else {
                                echo "<a href='login.html' class='button'>Login</a>";
                            }
                        ?>
                    </div>
                </div>
                <div class="menu-hamburguer">
                    <img src="Imagens/menu-icon.png" width="50px">
                </div>
            </div>
        </div>
        <div class="box; fade-in-text">
            <h1>Bem vindo ao nosso site!</h1>
        </div>
        <h2 class="fade-in-text; tag">Nossos produtos</h2><br><br>
        <div class="comercio">
            <div class="tag" id="produtos">
                <img src="Imagens/caderno_modelo1.jpg" alt="">
                <p>Caderno modelo 1</p>
                <p class="preco">R$20,00</p><br>
                <a href="produtos.html" class="button">Ver produto</a>
            </div>

            <div class="tag" id="produtos">
                <img src="Imagens/caderno_modelo2.jpg" alt="">
                <p>Caderno modelo 2</p>
                <p class="preco">R$20,00</p><br>
                <a href="produtos.html" class="button">Ver produto</a>
            </div>
            <div class="tag" id="produtos">
                <img src="Imagens/caderno_modelo3.jpg" alt="">
                <p>Caderno modelo 3</p>
                <p class="preco">R$20,00</p><br>
                <a href="produtos.html" class="button">Ver produto</a>
            </div>
        </div>
        <div class="baixo">
            <img src="Imagens/LogoInsta.png" alt="Logo Instagram" width="50px">@Ecoline.ltda</div>

        <footer>
            <div class="rodape">
                
            </div>
        </footer>
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
    </script>
    </div>
</body>

</html>