<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <link rel="icon" href="Imagens/Logotipo.png" type="image/png">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php
        include "util.php";
        $conn = conecta();
        $id_produto = $_GET['id'];
        $varSQL = "SELECT * FROM produto WHERE id_produto = :id_produto";
        $select = $conn->prepare($varSQL);
        $select->bindParam(":id_produto", $id_produto);
        $select->execute();
        $linha = $select->fetch();

        $id = $linha['id_produto'];
        $nome = $linha['nome'];
        $descricao = $linha['descricao'];
        $tipo_produto = $linha['tipo_produto'];
        $valor_unitario = $linha['valor_unitario'];
        $foto = "Imagens/c".$linha['id_produto'].".jpg"; //Armazena o endereço da imagem na variável foto
        
    ?>

    <form action='updateProdutos.php' method='post' enctype="multipart/form-data" class="box">
        <h1>Alterar o produto</h1>
        <input type='hidden' name='id_produto' value='<?php echo $id_produto; ?>'>
        <p>Nome do produto</p>
        <input type='text' name='nome' class="textbox" placeholder="Insira o nome do produto..." value='<?php echo $nome; ?>' required>
        <p>Descrição do produto</p>
        <input type='text' name='descricao' class="textbox" placeholder="Insira a descrição do produto..." value='<?php echo $descricao; ?>' required>
        <p>Tipo</p>
        <input type='text' name='tipo_produto' class="textbox" placeholder="Insira o tipo do produto..." value='<?php echo $tipo_produto; ?>'required>
        <p>Valor Unitário</p>
        <input type='number' step="0.01" name='valor_unitario' class="textbox" placeholder="Insira o valor unitário do produto..." value='<?php echo $valor_unitario; ?>' required>
        <br><br>
        Carregar a foto do produto (jpg)<br><br>
        <input type="file" name="imagemNova" accept="image/*"/><br><br><br>
        Foto atual<br>
        <img src='<?php echo $foto; ?>' alt='Imagem do produto' width='100'><br> <!--Mostra a imagem que estava anteriormente-->
        <br>
        <input type='submit' value='Salvar' class="button">
        <br>
        <a href='crudProdutos.php'>Voltar</a>
    </form>
</body>
</html>