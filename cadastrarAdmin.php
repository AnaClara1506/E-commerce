<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <form action="insertAdmin.php" method="POST" class="box">
            <h1>Realize seu cadastro</h1>
            <h2>Administrador</h2>
            <p>Nome completo:</p>
            <input type="text" name="nome" class="textbox" placeholder="Insira o seu nome..." required>
            <p>Telefone:</p>
            <input type="text" name="telefone" class="textbox" placeholder="Insira o seu número de telefone..." required>
            <p>Endereço de E-mail:</p>
            <input type="email" name="email" class="textbox" placeholder="Insira o seu E-mail..." required>
            <p>Crie sua senha:</p>
            <input type="password" name="senha" class="textbox" placeholder="Crie sua senha..." required>
            <input type="password" class="textbox" placeholder="Confirme sua senha..." required>
            <input type="submit" class="button" value="Cadastrar-se">
        </form>
    </body>
</html>