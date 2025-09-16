<?php
    include "util.php";
    $conn = conecta();
    $id_produto = $_GET['id'];
    $varSQL = "UPDATE produto set
                excluido = :excluido
                WHERE id_produto = :id_produto";
    $update = $conn->prepare($varSQL);
    $excluido = 1;
    $update->bindParam(":excluido", $excluido);
    $update->bindParam(":id_produto", $id_produto);

    $update->execute();

    header('Location: crudProdutos.php');

?>