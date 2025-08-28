
<html>
<head>
    <title>Formulario Usuários</title>
</head>


<body>
    <form method='POST' name='form' action='insertUsuario.php'>


        <label for='nome'>Digite o seu nome:</label><br>
        <input type='text' name='nome' id='nome'><br><br>


        <label for='email'>Digite o seu email:</label><br>
        <input type='text' name='email' id='email'><br><br>


        <label for='senha'>Digite a sua senha:</label><br>
        <input type='text' name='senha' id='senha'><br><br>


        <label for='admin'>Digite o id de administrador <br>ou 0 para cliente:</label><br>
        <input type='numeric' name='admin' id='admin'><br><br>


        <button type='submit'>Cadastrar</button>


    </form>
</body>
</html>
