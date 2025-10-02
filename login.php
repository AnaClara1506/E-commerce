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
                    <input type="email" name='usuario' class="textbox" placeholder="Insira o seu email...">
                    <input type="password" name='senha' class="textbox" placeholder="Insira a sua senha...">
                    <a href="esqueciASenha.php">Esqueci a senha?</a><br>
                    <input type="submit" class="button" value="Entrar"><br> 
                </form>
            <div class='login-invalido'>
    </body>
    <?php
        if ( $_POST ) {
            include "util.php";
            session_start();

            $usuario = $_POST['usuario'];
            $conn = conecta();

			$select = $conn->prepare("select id_usuario, nome,senha,admin,excluido
                                      from usuario 
                                      where email=:usuario");

            $select->bindParam(":usuario",$usuario);


            $senha   = $_POST['senha'];

            $select->execute();
            $linha = $select->fetch();
            if($linha && !$linha['excluido']){
                if ( password_verify($senha,$linha['senha']) ) {
                    $_SESSION['statusConectado'] = true;
                    $_SESSION['admin'] = $linha['admin'];
                    $_SESSION['login'] = $linha['nome'];
                    $_SESSION['id_usuario'] = $linha['id_usuario'];
                    header("location: index.php");   
                    echo "</div> </div>";
                } else {
                    $_SESSION['statusConectado'] = false;
                    $_SESSION['admin'] = false;
                    $_SESSION['login'] = "";
                    echo "Senha Inválido! Redigite! </div></div>";
                }         
            }
            else {
                echo "Usuário não existe! <br>";
                echo "<a href='cadastrar.php'>Clique aqui</a> para cadastrar-se!</div></div>";
            }              
        }       
    ?>

</html>