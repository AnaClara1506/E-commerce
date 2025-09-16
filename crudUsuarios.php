<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuário</title>
    <?php session_start(); ?>
    <?php include 'cabecalho.php'; ?>
</head>
<body>
    <?php include "util.php";
    $conn = conecta();
    
    $varSQL = "SELECT * FROM usuario";
    $select = $conn->query($varSQL); ?>
    <br>
    <h1 class='fade-in-text'> Crud Usuário <h1>
    <br>
    <div class='fade-in-text'>
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
                if(!$linha['excluido']){
                    echo "<tr><td>".$linha['id_usuario']."</td>";
                    echo "<td>".$linha['nome']."</td>";
                    echo "<td>".$linha['email']."</td>";
                    echo "<td> Criptografia </td>";
                    echo "<td>".$linha['admin']."</td>";
                    echo "<td>".$linha['telefone']."</td>";
                    echo "<td><a href='alterarUsuario.php?id_usuario=".$linha['id_usuario']."'>Alterar</a></td>";
                    echo "<td><a href='excluirUsuario.php?id_usuario=".$linha['id_usuario']."'>Excluir</a></td></tr>";
                }
            } ?>
                </table>
                <br>
                <a href='cadastrar.php'>Adicionar novo usuário</a> <br>
                <a href='cadastrarAdmin.php'>Adicionar novo admin</a> <br><br>
        </div>
        <?php include 'rodape.php'; ?>

</body>
</html>