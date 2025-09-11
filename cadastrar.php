<?php
session_start();
include "util.php";
$conn = conecta();
$varSQL = "INSERT INTO clientes (nome, telefone, email, senha)
VALUES (:nome, :telefone, :email, :senha)";
$insert = $conn->prepare($varSQL);
$insert->bindParam(':nome', $_POST['nome']);
$insert->bindParam(':telefone', $_POST['telefone']);
$insert->bindParam(':email', $_POST['email']);
$insert->bindParam(':senha', $_POST['senha']);
if($insert->execute()){
    $_SESSION['sessaoConectado'] = true;
    $_SESSION['login'] = $_POST['nome'];
}
?>

        <form action="index.php" method="POST" class="box">
        <h1>Realize seu cadastro</h1>
        <p>Nome completo:</p>
        <input type="nome" class="textbox" placeholder="Insira o seu nome...">
        <p>Telefone:</p>
        <input type="telefone" class="textbox" placeholder="Insira o seu número de telefone...">
        <p>Endereço de E-mail:</p>
        <input type="email" class="textbox" placeholder="Insira o seu E-mail...">
        <p>Crie sua senha:</p>
        <input type="senha" class="textbox" placeholder="Crie sua senha...">
        <input type="senha" class="textbox" placeholder="Confirme sua senha...">
        <a href="index.php" class="button">Cadastrar-se</a>
        </form>
