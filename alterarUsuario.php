<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Usuário</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>

    <?php
            session_start();
            include "util.php";
            $conn = conecta();
            $id_usuario = $_SESSION['id_usuario']; 
            $varSQL = "SELECT nome, email, telefone FROM usuario WHERE id_usuario = :id_usuario";
            $select = $conn->prepare($varSQL);
            $select->bindParam(':id_usuario', $id_usuario);
            $select->execute();
            $linha = $select->fetch(); 

            $nome = $linha['nome'];
            $telefone = $linha['telefone'];
            $email = $linha['email'];
        ?>

        
        <form action="updateUsuario.php" method="POST" class="box">
            <h1>Altere seu cadastro</h1>
            <input type='hidden' name='id_usuario' value='<?php echo $id_usuario; ?>'>
            <p>Nome completo:</p>
            <input type="text" name="nome" class="textbox"  value = '<?php echo $nome; ?>' required>
            <p>Telefone:</p>
            <input type="text" name="telefone" class="textbox"  value = '<?php echo $telefone; ?>'required>
            <p>Endereço de E-mail:</p>
            <input type="email" name="email" class="textbox"  value = '<?php echo $email; ?>' required>
            <input type="submit" class="button" value="Salvar Alterações">
        </form>
    </body>
</html>