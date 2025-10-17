<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "util.php";
    $conn = conecta();

    $id_produto = $_POST['id_produto'];
    $caminho_foto = null;

    // Verifica se uma nova imagem foi enviada
    if (isset($_FILES['imagemNova']) && $_FILES['imagemNova']['error'] == 0) {
        $varImagemRecebida = $_FILES['imagemNova']['tmp_name']; 
        $varArquivoPasta = "Imagens/c" . $id_produto . ".jpg";
        
        // Move o arquivo para a pasta do servidor
        if (move_uploaded_file($varImagemRecebida, $varArquivoPasta)) {
            $caminho_foto = $varArquivoPasta;
        }
    }

    // Query de atualização
    $varSQL = "UPDATE produto SET
                nome = :nome,
                descricao = :descricao,
                tipo_produto = :tipo_produto,
                valor_unitario = :valor_unitario,
                imagem = :img
                WHERE id_produto = :id_produto";

    $update = $conn->prepare($varSQL);
    $update->bindParam(':id_produto', $id_produto);
    $update->bindParam(':nome', $_POST['nome']); 
    $update->bindParam(':descricao', $_POST['descricao']);
    $update->bindParam(':tipo_produto', $_POST['tipo_produto']);
    $update->bindParam(':valor_unitario', $_POST['valor_unitario']);
    $update->bindParam(':img', $caminho_foto);

    $update->execute();

    header('Location: crudProdutos.php');
    exit;
?>
