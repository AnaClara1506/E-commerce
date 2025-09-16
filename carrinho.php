<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de compras</title>
    <?php session_start(); ?>
    <?php include 'cabecalho.php'; ?>
</head>
<body>
    <br>
    <h1 class='fade-in-text'> Carrinho de compras <h1>
    <br>
    <div class='fade-in-text'>
        <div class='table-responsiva'>
            <table border="1" class="tabela-carrinho">
                <tr>
                    <th>Produto</th>
                    <th>Id do produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                </tr>
                <?php 
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                ?>
            </table>
        </div>
        <br>
        <h2 class='fade-in-text'> Resumo do pedido: <h2>
        <br>
        <table border="1" class="tabela-resumo">
            <tr>
                <th>Quantidade total</th>
                <th>Total</th>
            </tr>
            <?php 
                echo "<td></td>";
                echo "<td></td>";
            ?>
        </table>
        <br>
        <a href='produtos.php' class="button">Finalizar a compra</a> <br>
    </div>
    <br>
    <?php include 'rodape.php'; ?>
    <script src="script.js"></script>
</body>
</html>