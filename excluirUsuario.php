<?php
include 'util.php';

$conn = conecta();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $varSQL = "DELETE FROM usuarios WHERE id = :id";

    $delete = $conn->prepare($varSQL);
    $delete->bindParam(':id', $id);

    if ($delete->execute()) {
        echo "Produto excluído com sucesso.<br>";
    } else {
        echo "Erro ao excluir produto.<br>";
    }
} else {
    echo "ID não informado.";
}

echo '<a href="produtos.php">Voltar para a lista de produtos</a>';
?>