<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php session_start(); ?>
    <?php include 'cabecalho.php' ?>
</head>
<body>
    <?php include "util.php";
    $conn = conecta();
    
    $varSQL = "SELECT * FROM usuario";
    $select = $conn->query($varSQL); ?>
    <br>
    <?php 
        if(isset($_SESSION['statusConectado']) && $_SESSION['statusConectado'] == true){
                echo "<h2>Olá, ".$_SESSION['login']."</h2><br>";
                echo "<a href='logout.php' class='button'>Logout</a>";
        }
    ?>
</body>
</html>