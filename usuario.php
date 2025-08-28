<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!--<link rel="stylesheet" href="css/style.css">-->
</head>
<body>
    <?php include "util.php";
    $conn = conecta();
    
    $varSQL = "SELECT * FROM usuario";
    $select = $conn->query($varSQL); ?>
    
    <h1> CRUD USUÁRIO <h1>
    <br>
    <table border="1">
        <tr>
            <th>Id do usuário</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Admin</th>
            <th>Telefone</th>
            <th></th>
            <th></th>
        </tr>
        <?php while ($linha = $select->fetch() ){
            echo "<tr><td>".$linha['id_usuario']."</td>";
            echo "<td>".$linha['nome']."</td>";
            echo "<td>".$linha['email']."</td>";
            echo "<td>".$linha['senha']."</td>";
            echo "<td>".$linha['admin']."</td>";
            echo "<td>".$linha['telefone']."</td>";
            echo "<td><a href='alterarUsuario.php?id_usuario=".$linha['id_usuario']."'>Alterar</a></td>";
            echo "<td><a href='excluirUsuario.php?id_usuario=".$linha['id_usuario']."'>Excluir</a></td></tr>";
        }
        echo "</table><br><a href='adicionarUsuario.php'>Adicionar novo produto</a>"; ?>

</body>
</html>