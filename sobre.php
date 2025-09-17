<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <?php session_start(); ?>
    <?php include 'cabecalho.php' ?>
  </head>
  <body>
    <div class="container">
      <br>
      <h1 class="fade-in-text">Sobre a nossa empresa</h1>
      <br>
      <article>
        <h2 class="fade-in-text"> O que é a Ecoline? </h2>
        <h3 class="fade-in-text">
          A empresa EcoLine LTDA surgiu com a iniciativa de projeto por parte das disciplinas de Informática 
          e Gestão de Negócios, onde os alunos do segundo ano do curso de informática se reúnem em grupos para 
          formar empresas e vender produtos que estarão disponíveis para a venda durante a Semana do Colégio em 
          outubro de 2025 no CTI. A empresa é composta por 6 integrantes e possui uma visão ecológica de consumo, 
          apresentando a ideia de que é possível ser sustentável no cotidiano.
        </h3>
      </article>
      <br>
      <h2 class="fade-in-text"> Integrantes </h2><br>
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
          <img src="Imagens/MariaLuiza.jpg" alt="Maria Luiza" class="fade-in-text">
          <figcaption>Maria Luiza</figcaption>
        </figure>
        <figure>
          <img src="Imagens/Sophia.jpg" alt="Sophia" class="fade-in-text">
          <figcaption>Sophia</figcaption>
        </figure>
      </div>
      <br>
      <div class='missao'>
        <article>
          <h2 class="fade-in-text">Nossa Missão </h2>
          <h3 class="fade-in-text">
            A empresa EcoLine possui como missão oferecer aos seus clientes produtos de qualidade
            que sejam benéficos ao meio ambiente, unindo funcionalidade e responsabilidade
            ambiental. Por meio de folhas sustentáveis e capas de tecido, o principal objetivo é
            transmitir simplicidade e sustentabilidade, apresentando aos clientes uma forma de conciliar
            as tarefas e demandas diárias com a preservação e respeito à natureza. Nosso propósito é
            oferecer uma alternativa para a escrita e organização que reduza os impactos ambientais,
            preservando a praticidade e incentivando as pequenas práticas que auxiliarão na
            transformação de um futuro sustentável e equilibrado entre as pessoas e o planeta Terra.
          </h3> 
        </article>
      </div>
      <br><br>
      <?php include("rodape.php") ?>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>
