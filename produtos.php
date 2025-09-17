<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php session_start(); ?>
    <?php include 'cabecalho.php' ?>
</head>

<body>
    <div class="fade-in-text; container">
        <br><h1>Conheça nossos produtos!</h1><br>
        <div class="info-produtos">
            <img src="Imagens/imgcaderno1.jpg" alt="Caderno" class="fade-in-text" width="80px">
            <p class='p-produtos'>Os cadernos EcoLine se diferenciam pela proposta sustentável que é oferecida ao cliente,
                com 32 folhas de papel reciclado que são inseridas em cada produto, possuindo o formato
                de 22,2 cm x 15 cm. As capas, confeccionadas em papel paraná, são revestidas com
                tecidos de qualidade e de estilos variados, para que se amoldem à individualidade de cada
                comprador. Todos os processos envolvidos na produção dos cadernos são realizados
                artesanalmente, à mão pelos integrantes da empresa, desde a costura dos blocos de folhas
                até a colagem dos tecidos nas capas, de forma a garantir ao cliente um produto
                personalizado, além de ser ecologicamente correto e versátil no cotidiano.
            </p>
        </div><br><br>
        <h2 class="fade-in-text">Garanta já o seu!</h2><br>
        <?php 
                include "util.php";
                $conn = conecta();
                $varSQL = "SELECT * FROM produto";
                $select = $conn->prepare($varSQL);
                $select->execute();
                $linha = $select->fetch();
        ?>
        <div class='tag'>
            <div class="lista-produtos">
                <?php while ($linha = $select->fetch() ){
                    $foto = "Imagens/c".$linha['id_produto'].".jpg";
                    echo "<div class ='container-produtos'><img src = '$foto'>";
                    echo "<div class='dados-produto'> <p>".$linha['nome']."</p>";
                    echo "<p>".$linha['descricao']."</p>";
                    echo "<p>".$linha['tipo_produto']."</p>";
                    echo "<p class='preco'>".$linha['valor_unitario']."</p>";
                    echo "<a href='produtos.php' class='button'>Adicionar ao carrinho</a>";
                    echo "</div></div>";
                }?>      
            </div>
        </div>
        <br><br>
        <?php include("rodape.php") ?>
    </div>
    
    <script src="js/script.js"></script>
</body>

</html>