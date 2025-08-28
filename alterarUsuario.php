<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD usuários</title>
    </head>
    <body>
        <?php
            include "util.php";
            $conn = conecta();
            $id_usuario = $_GET['id_usuario']; 
            $varSQL = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";

            $select = $conn->prepare($varSQL);
            $select->bindParam(':id_usuario' ,$id_usuario);
            $select->execute();
            $linha = $select->fetch(); 

            $nome = $linha['nome'];
            $email = $linha['email'];
            $senha = $linha['senha'];
            $admin = $linha['admin'];
            $telefone = $linha['telefone'];
        ?>
        
        
        <form action= 'updateUsuario.php' method='post'>
            <input type='hidden' name='id_usuario' value='<?php echo $id_usuario; ?>'>
            Nome<br>
            <input type='text' name='nome'
                value = '<?php echo $nome; ?>'><br><br>
            Email<br>
            <input type='text' name='email' 
                value='<?php echo $email; ?>'><br><br>
            Senha<br>
            <input type='password' name='senha'
                value='<?php echo $senha; ?>'><br><br>
            Admin<br>
            <input type='numeric' name='admin'
                value='<?php echo $admin; ?>'><br><br>
            Telefone<br>
            <input type='numberic' name='telefone'
                value='<?php echo $telefone; ?>'><br><br>
            <button type='submit'>Alterar usuário</button>
        </form>
    </body>
</html>
