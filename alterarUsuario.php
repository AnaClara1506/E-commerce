<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD usuários</title>
    </head>
    <body>
        <?php
            include "util.php";
            $conn = conecta();
            $cod_usuario = $_GET['cod_usuario']; 
            $varSQL = "SELECT * FROM usuario WHERE cod_usuario = :cod_usuario";

            $select = $conn->prepare($varSQL);
            $select->bindParam(':cod_usuario' ,$cod_usuario);
            $select->execute();
            $linha = $select->fetch(); 

            $nome = $linha['nome'];
            $email = $linha['email'];
            $senha = $linha['senha'];
            $admin = $linha['admin'];
            $telefone = $linha['telefone'];
        ?>
        
        
        <form action= 'updateUsuario.php' method='post'>
            <input type='hidden' name='cod_usuario' value='<?php echo $cod_usuario; ?>'>
            Nome<br>
            <input type='text' name='nome'
                value = '<?php echo $nome; ?>'><br><br>
            Email<br>
            <input type='text' name='email' 
                value='<?php echo $email; ?>'><br><br>
            Senha<br>
            <input type='text' name='senha'
                value='<?php echo $senha; ?>'><br><br>
            Admin<br>
            <input type='number' name='admin'
                value='<?php echo $admin; ?>'><br><br>
            Telefone<br>
            <input type='number' name='telefone'
                value='<?php echo $telefone; ?>'><br><br>
            <button type='submit'>Alterar usuário</button>
        </form>
    </body>
</html>
