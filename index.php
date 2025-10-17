<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecoline LTDA</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php include 'cabecalho.php'; ?>
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
            <!--Slider-->
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <!--Imagens do slider-->
                    <div class="slide first">
                        <img src="Imagens/imgcaderno1.jpg" alt="Imagem 1">
                    </div>
                    <div class="slide">
                        <img src="Imagens/imgcaderno2.jpg" alt="Imagem 2">
                    </div>
                    <div class="slide">
                        <img src="Imagens/imgcaderno3.jpg" alt="Imagem 3">
                    </div>
                    <div class="slide">
                        <img src="Imagens/imgcaderno4.jpg" alt="Imagem 4">
                    </div>

                    <!--Navegação auto-->
                    <div class="navigation-auto">
                        <div class="auto-btn1">

                        </div>
                        <div class="auto-btn2">
                            
                        </div>
                        <div class="auto-btn3">
                            
                        </div>
                        <div class="auto-btn4">
                            
                        </div>
                    </div>
                    <div class="manual-navigation">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
            <br>
            <h2 class="tag">Nossos produtos</h2><br>
            <div class="comercio">
                <?php 
                    include "util.php";
                    $conn = conecta();
                    $varSQL = "SELECT * FROM produto";
                    $select = $conn->prepare($varSQL);
                    $select->execute();
                    $linha = $select->fetch();
                ?>
                <?php while ($linha = $select->fetch() ){
                    if(!$linha['excluido']){
                        echo "<div class='tag' id='produtos'>";
                        $foto = "Imagens/c".$linha['id_produto'].".jpg";
                        echo "<img src = '$foto'>";
                        echo "<p>".$linha['nome']."</p>";
                        echo "<p class='preco'> R$ ".$linha['valor_unitario']."</p><br>";
                        echo "<a href='produtos.php' class='button'>Ver produto</a>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
        <br><br><br>
        <?php include("rodape.php") ?>
    </div>
    <script src="js/script.js"></script>
</body>

</html>