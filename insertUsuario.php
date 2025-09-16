<?php
    include "util.php";
    $conn = conecta();
    $varSQL ="insert into usuario (nome, email, senha, telefone)
            values (:nome, :email, :senha, :telefone)";
            
    $senha = $_POST['senha'];
    $senhaCripto = password_hash($senha,PASSWORD_DEFAULT);
    $insert = $conn->prepare($varSQL);
    $insert->bindParam(':nome', $_POST['nome']);
    $insert->bindParam(':email', $_POST['email']);
    $insert->bindParam(":senha",$senhaCripto);
    $insert->bindParam(':telefone', $_POST['telefone']);
    $insert->execute();
   
    header('Location: login.php');
?>