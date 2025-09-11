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
        <form action="cadastrar.php" method="POST" class="box">
            <h1>Realize seu cadastro</h1>
            <p>Nome completo:</p>
            <input type="text" name="nome" class="textbox" placeholder="Insira o seu nome...">
            <p>Telefone:</p>
            <input type="text" name="telefone" class="textbox" placeholder="Insira o seu número de telefone...">
            <p>Endereço de E-mail:</p>
            <input type="text" name="email" class="textbox" placeholder="Insira o seu E-mail...">
            <p>Crie sua senha:</p>
            <input type="password" name="senha" class="textbox" placeholder="Crie sua senha...">
            <input type="password" class="textbox" placeholder="Confirme sua senha...">
            <input type="submit" class="button" value="Cadastrar-se">
        </form>
    </body>
    <?php
        if($_POST){
            session_start();
            include "util.php";
            $conn = conecta();
            $varSQL = "INSERT INTO usuario (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";
            $insert = $conn->prepare($varSQL);
            $insert->bindParam(':nome', $_POST['nome']);
            $insert->bindParam(':telefone', $_POST['telefone']);
            $insert->bindParam(':email', $_POST['email']);
            $insert->bindParam(':senha', $_POST['senha']);
                
            if($insert->execute()){
                $_SESSION['sessaoConectado'] = true;
                $_SESSION['login'] = $_POST['nome'];
            }
            header('Location: index.php');
        }
    ?>
</html>