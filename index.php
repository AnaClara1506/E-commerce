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
                        <a href="index.php" id="selecionado">Home</a>
                        <a href="Sobre.php">Sobre</a>
                        <a href="produtos.php">Produtos</a>
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
                                            <a href='cadastrar.html'>Cadastrar</a>
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
        <div class="box; fade-in-text">
            <h1>Bem vindo ao nosso site!</h1>
            <article>
                <h3 class="fade-in-text">
                    Oferecemos cadernos de qualidade, feitos à mão, estilizados e personalizados para nossos clientes.
                    Todos os produtos foram projetados pensando de forma sustentável para a venda, auxiliando no cotidianos de quem 
                    os utiliza de forma ecológica.
                </h3>
            </article>
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
        <footer>
            <div class="rodape">
                <div class="instagram">
                    <h3>Siga-nos</h3>
                    <img src="Imagens/LogoInsta.png" alt="Logo Instagram" width="50px">@Ecoline.ltda</div>
                </div>
                <div class="contato">
                    <h3>Telefone para contato</h3>
                    <h3>Email para contato</h3>
                </div>
                <div class="patrocinio">
                    <h3>Patrocinadores</h3>
                </div>
                @Feito por Ecoline.ltda
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function () {
            $(".tag").addClass("visible");
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