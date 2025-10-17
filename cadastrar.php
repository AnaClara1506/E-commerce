<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="icon" href="Imagens/Logotipo.png" type="image/png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <form action="insertUsuario.php" method="POST" class="box">
            <h1>Realize seu cadastro</h1>
            <p>Nome completo:</p>
            <input type="text" name="nome" class="textbox" placeholder="Insira o seu nome..." required>
            <p>Telefone:</p>
            <input type="text" name="telefone" class="textbox" placeholder="Insira o seu número de telefone..." required>
            <p>Endereço de E-mail:</p>
            <input type="email" name="email" class="textbox" placeholder="Insira o seu E-mail..." required>
            <p>Crie sua senha:</p>
            <input type="password" name="senha" class="textbox" placeholder="Crie sua senha... (8 dígitos)" minlength="8" maxlength="8" required>
            <input type="password" class="textbox" name="senha-confirmacao" placeholder="Confirme sua senha (8 dígitos)..." minlength="8" maxlength="8" required>
            <input type="submit" class="button" value="Cadastrar-se"><br>
            <?php if(isset($_GET['erro']) && $_GET['erro'] === 'senha'){
                echo "<p> Digite a mesma senha nos dois campos! </p>";
            }?>
        </form>
    </body>
</html>