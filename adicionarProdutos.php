<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar Produto</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <form action= "insertProdutos.php" method= post enctype='multipart/form-data' class='box'>
            <h1>Cadastre um produto</h1>
            <p>Nome do produto</p>
            <input type='text' name='nome' class="textbox" placeholder="Insira o nome do produto..." required>

            <p>Descrição do produto</p>
            <input type='text' name='descricao' class="textbox" placeholder="Insira a descrição do produto..." required>

            <p>Tipo</p>
            <input type='text' name='tipo_produto' class="textbox" placeholder="Insira o tipo do produto..." required>

            <p>Valor Unitário</p>
            <input type='number' step="0.01" name='valor_unitario' class="textbox" placeholder="Insira o valor unitário do produto..." required>

            <p>Carregar a foto do produto (jpg)</p>
            <input type="file" name="imagem" accept="image/*"/>

            <br><br>
            <input type='submit' value='Salvar' class="button">
            <br>
            <a href='crudProdutos.php'>Voltar</a>
        </form>
        <br>
    </body>
</html>
