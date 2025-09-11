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
                <h1>Login do Usuário</h1>
                <form action="" method="post">
                    <input type="text" name='usuario' class="textbox" placeholder="Insira o seu nome...">
                    <input type="password" name='senha' class="textbox" placeholder="Insira a sua senha...">
                    <a href="esqueciasenha.html">Esqueceu a senha?</a><br>
                    <input type="submit" class="button" value="Entrar"><br> 
                </form>
            </div>
    </body>
    <?php
        session_start();
        if( $_POST ){

            include "util.php";

            $conn = conecta();

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $select = $conn->prepare("SELECT nome, senha, admin FROM usuario WHERE (email = :usuario)");

            $select->bindParam(":usuario",$usuario);

            $select->execute();

            $linha = $select->fetch();

            if( password_verify($usuario, $linha['senha']) ){
                $_SESSION['sessaoConectado'] = true;
                $_SESSION['login'] = $linha['nome'];
                $_SESSION['admin'] = $linha['admin'];
                header("location: index.php");
            }

            else{
                $_SESSION['sessaoConectado'] = false;
                $_SESSION['login'] = "";
            }
        }

    ?>

</html>