<?php
    include "util.php";
    $conn = conecta();
    
    $varSQL = "update usuario set nome = :nome, email = :email, telefone = :telefone  WHERE id_usuario = :id_usuario";

    $update = $conn->prepare($varSQL);

    $id_usuario = $_POST['id_usuario'];
    $update->bindParam(':id_usuario', $id_usuario);
    $update->bindParam(':nome', $_POST['nome']);
    $update->bindParam(':email', $_POST['email']);
    $update->bindParam(':telefone', $_POST['telefone']);

    $update->execute();

    header('Location: usuario.php');
?>