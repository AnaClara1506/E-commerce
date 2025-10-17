<?php
    if ( session_status() !== PHP_SESSION_ACTIVE ){
        session_start();
    }
    $id_sessao = session_id();
    include "util.php";
    $conn = conecta();
    $id_usuario = $_GET['id_usuario'];
    $varSQL = "UPDATE usuario set
                excluido = :excluido
                WHERE id_usuario = :id_usuario";
    $update = $conn->prepare($varSQL);
    $excluido = 1;
    $update->bindParam(":excluido", $excluido);
    $update->bindParam(":id_usuario", $id_usuario);

    $update->execute();

     if($id_usuario == $_SESSION['id_usuario']){
        header('Location: logout.php');
    }
    else{
        header('Location: crudUsuarios.php');
    }

?>