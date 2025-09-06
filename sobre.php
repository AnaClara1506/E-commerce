<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecoline LTDA</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  </head>
  <body>
    <div class="container">
      <div class="container-imagem">
        <div class="topo">
          <img src="Imagens/Logotipo.png" alt="Logotipo" width="100px" class="logo" />
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
            <img src="Imagens/menu-icon.png" width="50px" />
          </div>
        </div>
      </div>
      <h1 class="fade-in-text">Sobre a nossa empresa</h1>
      <article>
        <h3 class="fade-in-text">
          Ecoline é uma empresa dedicada à produção e venda de cadernos
          ecológicos, feitos com materiais reciclados e sustentáveis. Nosso
          objetivo é oferecer produtos de qualidade que respeitam o meio
          ambiente e incentivam o consumo consciente. Com a Ecoline, você
          escreve suas ideias enquanto cuida do planeta.
        </h3>
      </article>
      <div class="integrantes">
        <figure>
          <img src="Imagens/AnaClara.jpg" alt="Ana Clara" class="fade-in-text"> 
          <figcaption>Ana Clara</figcaption>
        </figure>
        <figure>
          <img src="Imagens/Eshley.jpg" alt="Eshley" class="fade-in-text"> 
          <figcaption>Eshley</figcaption>
        </figure>
        <figure>
          <img src="Imagens/Gabriel.jpg" alt="Gabriel" class="fade-in-text">
          <figcaption>Gabriel</figcaption>
        </figure>
        <figure>
          <img src="Imagens/Guilherme.jpg" alt="Guilherme" class="fade-in-text">
          <figcaption>Guilherme</figcaption>
        </figure>
        <figure>
          <img src="Imagens/Sophia.jpg" alt="Maria Luiza" class="fade-in-text">
          <figcaption>Maria Luiza</figcaption>
        </figure>
        <figure>
          <img src="Imagens/Sophia.jpg" alt="Sophia" class="fade-in-text">
          <figcaption>Sophia</figcaption>
        </figure>
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
    </script>
  </body>
</html>
