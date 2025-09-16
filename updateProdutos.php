<?php
    include "util.php";
    $conn = conecta();

    $caminho_foto = $_FILES['imagem'];

    $varSQL = "UPDATE produto set
                nome = :nome, descricao = :descricao, tipo_produto = :tipo_produto, valor_unitario = :valor_unitario, caminho_foto = :caminho_foto
                WHERE id_produto = :id_produto";

    $id_produto = $_POST['id_produto'];

     if($_FILES['imagemNova'])
    {
        $varImagemRecebida = $_FILES['imagemNova']['tmp_name']; 
        $varArquivoPasta = "Imagens/c".$id_produto.".jpg";
        move_uploaded_file($varImagemRecebida, $varArquivoPasta);
        $caminho_foto = $varArquivoPasta;
    }

    $update = $conn->prepare($varSQL);
    $update->bindParam(":id_produto", $_POST['id_produto']);
    $update->bindParam(":nome", $_POST['nome']); 
    $update ->bindParam(':descricao' , $_POST['descricao']);
    $update ->bindParam(':tipo_produto' , $_POST['tipo_produto']);
    $update ->bindParam(':valor_unitario' , $_POST['valor_unitario']);
    $update ->bindParam(':caminho_foto' , $caminho_foto);

    $update->execute();


    header('Location: crudProdutos.php');
?>