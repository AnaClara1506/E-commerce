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