<?php
    include "util.php";
    $conn = conecta();
    $varSQL = "INSERT INTO produto (nome, descricao, tipo_produto, valor_unitario) values (:nome, :descricao, :tipo_produto, :valor_unitario)";

    $insert = $conn->prepare($varSQL);
    $insert ->bindParam(':nome' , $_POST['nome']);
    $insert ->bindParam(':descricao' , $_POST['descricao']);
    $insert ->bindParam(':tipo_produto' , $_POST['tipo_produto']);
    $insert ->bindParam(':valor_unitario' , $_POST['valor_unitario']);
    
    $insert ->execute();

    if($_FILES['imagem']) 
    {
       $id = $conn -> lastInsertId(); //Atrubui a variável id o valor do id inserido
       $varImagemRecebida = $_FILES['imagem']['tmp_name']; //Armazena a imagem recebida
       $varArquivoPasta = "Imagens/c$id.jpg"; //Define um nome padrão para o arquivo que será salvo na pasta images
       if(move_uploaded_file($varImagemRecebida, $varArquivoPasta)){ //Move o arquivo para a pasta e retorna true se obtiver sucesso
        $varSQL = "UPDATE produto SET imagem = :imagem, WHERE id_produto = :id_produto";
        $update = $conn->prepare($varSQL);
        $update->bindParam(':id_produto', $id);
        $update->bindParam(':imagem', $varArquivoPasta); //Cria o parâmetro para o banco do arquivo salvo
        $update->execute();
       }
    } 

    header('Location: crudProdutos.php');
?>