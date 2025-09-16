<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minha Conta</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <?php 
            session_start();
            include 'cabecalho.php';
        ?>
    </head>
    <body>
        <?php
            include "util.php";
            $conn = conecta();

            //Verifica a conexão da sessão
            if (!isset($_SESSION['statusConectado']) || !$_SESSION['statusConectado']) {
                header('Location: login.php');
                exit;
            }

            $id_usuario = $_SESSION['id_usuario'];

            // Busca os dados do usuário no banco
            $varSQL = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
            $select = $conn->prepare($varSQL);
            $select->bindParam(":id_usuario", $id_usuario);
            $select->execute();
            $linha = $select->fetch();

            if ($linha) {
                echo "<br><h1> Informações sobre sua conta </h1><br>";
                echo "<div class='container-dados'>"; 
                echo "<p class='dados'><b>Olá, ".$_SESSION['login']."</p></b>";
                echo "<p class='dados'><b> Telefone: </b>".$linha['telefone']."</p>";
                echo "<p class='dados'><b> Email: </b>".$linha['email']."</p>";
                echo "<a href='alterarUsuario.php'>Alterar dados </a>";
                echo "<br><a href='logout.php' class='button'>Logout</a></div>";
            }
        ?>
    </body>
</html>
