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
                <h1>Redefinir senha</h1>
                <form action="" method="post">
                    <p>Digite a sua nova senha:</p>
                        <input type="password" name="nova-senha" class="textbox" placeholder="Insira a nova senha..." required>
                    <p>Confirme a sua nova senha:</p>
                        <input type="password" name="confirma-senha" class="textbox" placeholder="Confirme a nova senha..." required>
                        <input type="submit" class="button" value="Redefinir"><br>
                </form>
            <div>
            <?php header('Location: index.php'); ?>
    </body>