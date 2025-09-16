<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
            <div class="box">
                <h1>Confirmação de usuário</h1>
                <form action="redefinirSenha.php" method="post">
                    <p>Digite o seu nome completo:</p>
                        <input type="text" name="nome" class="textbox" placeholder="Insira o seu nome..." required>
                    <p>Digite o seu endereço de e-mail:</p>
                        <input type="text" name="email" class="textbox" placeholder="Insira o seu e-mail..." required>
                        <input type="submit" class="button" value="Confirmar"><br>
                </form>
            <div>
    </body>