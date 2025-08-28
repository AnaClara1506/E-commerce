<?php
    include "util.php";
    $conn = conecta();
    
    $varSQL = "update usuario set nome = :nome, email = :email, senha = :senha, admin = :admin, telefone = :telefone  WHERE id_usuario = :id_usuario";

    $update = $conn->prepare($varSQL);

    $id_usuario = $_POST['id_usuario'];
    $update->bindParam(':id_usuario', $id_usuario);
    $update->bindParam(':nome', $_POST['nome']);
    $update->bindParam(':email', $_POST['email']);
    $update->bindParam(':senha', $_POST['senha']);
    $update->bindParam(':admin', $_POST['admin']);
    $update->bindParam(':telefone', $_POST['telefone']);

    $update->execute();

    header('Location: usuario.php');
?>