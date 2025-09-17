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
    <div class='table-responsiva' id="table-usuario">
        <table class='fade-in-text' border="1">
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
            } 
            echo "</table></div> 
                    <a href='cadastrar.php' class='fade-in-text'>Adicionar novo usuário</a>
                    <a href='cadastrarAdmin.php' class='fade-in-text'>Adicionar novo admin</a> "; ?>
    <br><br>
    <script src="js/script.js"></script>
    <?php include 'rodape.php'; ?>
</body>
</html>