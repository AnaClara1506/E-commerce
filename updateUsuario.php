<?php
    include "util.php";
    $conn = conecta();
    
    $varSQL = "update usuario set nome = :nome, email = :email, senha = :senha, admin = :admin, telefone = :telefone  WHERE cod_usuario = :cod_usuario";

    $update = $conn->prepare($varSQL);

    $update->bindParam(':cod_usuario', $cod_usuario);
    $update->bindParam(':nome', $_POST['nome']);
    $update->bindParam(':email', $_POST['email']);
    $update->bindParam(':senha', $_POST['senha']);
    $update->bindParam(':admin', $_POST['admin']);
    $update->bindParam(':telefone', $_POST['telefone']);

    header('Location: usuario.php');
?>