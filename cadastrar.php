<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    </head>

    <body>
    <?php
      include "util.php";
      $conn = conecta();
      if ($_POST){
      $varSQL = "INSERT INTO ... (nome, telefone, email, senha)
            VALUES (:nome, :telefone, :email, :senha)";
      $insert = $conn->prepare($varSQL);
      $insert->bindParam(':nome', $_POST['nome']);
      $insert->bindParam(':telefone', $_POST['telefone']);
      $insert->bindParam(':email', $_POST['email']);
      $insert->bindParam(':senha', $_POST['senha']);
      $insert->execute();
 }


?>
        <form action="index.php" method="POST" class="box">
        <h1>Realize seu cadastro</h1>
        <p>Nome completo:</p>
        <input type="text" class="textbox" placeholder="Insira o seu nome...">
        <p>Telefone:</p>
        <input type="numeric" class="textbox" placeholder="Insira o seu número de telefone...">
            <p>Endereço de E-mail:</p>
            <input type="text" class="textbox" placeholder="Insira o seu E-mail...">
            <p>Crie sua senha:</p>
            <input type="password" class="textbox" placeholder="Crie sua senha...">
            <input type="password" class="textbox" placeholder="Confirme sua senha...">
            <a href="index.php" class="button">Cadastrar-se</a>

</form>
    </body>
</html>


