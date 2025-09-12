<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-imagem">
        <div class="topo">
            <img src="Imagens/Logotipo.png" alt="Logotipo" width="100px" class="logo">
            <div class="menu">
                <nav>
                        <a href="index.php">Home</a>
                        <a href="Sobre.php">Sobre</a>
                        <a href="produtos.php">Produtos</a>
                </nav>
            </div>
            <div class="container-botoes">
                <?php
                    if(isset($_SESSION['statusConectado']) && $_SESSION['statusConectado'] == true){ 
                        echo "<a href='minhaConta.php' class='button'>Minha Conta</a>";
                        echo "<a href='#' class='button'>Carrinho</a>";
                    }
                    else {
                        echo "<a class='button' id='login'>Login</a>";
                        echo "<div class='menu-login'>
                                <div class='flex-login'>
                                    <a href='login.php'>Entrar</a>
                                    <a href='cadastrar.php'>Cadastrar</a>
                                </div>
                            </div>";
                    }
                ?>
            </div>
            
            <div class="menu-hamburguer">
                <img src="Imagens/menu-icon.png" width="50px">
            </div>
        </div>
        
    </div>
    <script>
       $(document).ready(function() {
            $(".menu-hamburguer").click(function () {
                if ($(".menu-login").hasClass('active')) {
                    $(".menu-login").removeClass('active');
                }
                $(".menu").toggleClass("active");
            });

            $("#login").click(function () {
                if ($(".menu").hasClass('active')) {
                    $(".menu").removeClass('active');
                }
                $(".menu-login").toggleClass("active");
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(".menu-hamburguer, .menu").length) {
                    $(".menu").removeClass("active");
                }
                if (!$(event.target).closest("#login, .menu-login").length) {
                    $(".menu-login").removeClass("active");
                }
            });
        });
    </script>
</body>
</html>