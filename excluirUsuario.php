<?php
include 'util.php';

$conn = conecta();

if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    $varSQL = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

    $delete = $conn->prepare($varSQL);
    $delete->bindParam(':id_usuario', $id_usuario);

    if ($delete->execute()) {
        echo "Usuário excluído com sucesso.<br>";
    } else {
        echo "Erro ao excluir o usuário.<br>";
    }
} else {
    echo "ID do usuário não informado.";
}

 header('Location: usuario.php');
?>