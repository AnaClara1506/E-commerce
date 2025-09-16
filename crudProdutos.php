<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produtos</title>
    <?php session_start(); ?>
    <?php include 'cabecalho.php'; ?>
</head>
<body>
    <?php include "util.php";
    $conn = conecta();
    
    $varSQL = "SELECT * FROM produto";
    $select = $conn->query($varSQL); ?>
    <br>
    <h1 class="fade-in-text"> CRUD Produtos <h1>
    <br>
    <div class=fade-in-text>
        <table>
            <tr border="1">
                <th>Id do Produto</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor Unitário</th>
                <th>Foto</th>
                <th></th>
                <th></th>
            </tr>
            <?php while ($linha = $select->fetch() ){
                if(!$linha['excluido']){
                    echo "<tr><td>".$linha['id_produto']."</td>";
                    echo "<td>".$linha['nome']."</td>";
                    echo "<td>".$linha['descricao']."</td>";
                    echo "<td>".$linha['tipo_produto']."</td>";
                    echo "<td>".$linha['valor_unitario']."</td>";
                    $foto = "Imagens/c".$linha['id_produto'].".jpg";
                    echo "<td> <img src = '$foto' width=50px> </td>";
                    echo "<td><a href='alterarProdutos.php?id=".$linha['id_produto']."'>Alterar</a></td>";
                    echo "<td><a href='excluirProdutos.php?id=".$linha['id_produto']."'>Excluir</a></td></tr>";
                }
            }
            echo "</table><br><a href='adicionarProdutos.php'>Adicionar novo produto</a>"; ?>
    </div>
</body>
</html>