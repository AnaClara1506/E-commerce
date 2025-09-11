<?php
    include "util.php";
    $conn = conecta();
    $varSQL ="insert into usuario (nome, email, senha, admin, telefone)
            values (:nome, :email, :senha, :admin, :telefone)";
   
    $insert = $conn->prepare($varSQL);
    $insert->bindParam(':nome', $_POST['nome']);
    $insert->bindParam(':email', $_POST['email']);
    $insert->bindParam(':senha', $_POST['senha']);
    $insert->bindParam(':admin', $_POST['admin']);
    $insert->bindParam(':telefone', $_POST['telefone']);
    $insert->execute();
   
    header('Location: usuario.php');
?>