<!DOCTYPE html>
<html lang="en">

    <?php

        session_start();

        if(isset($_SESSION['sessaoConectado']) && $_SESSION['sessaoConectado'] == true){
            echo "Ola ".$_SESSION['login']."<br>";
            echo " <a href='produtos.php'>prods</a><a href='usuarios.php'>usuarios</a>";
            echo "<a href='usuarios.php'>logout</a>";
        }    
        else{
            echo "<a href = 'login.php'>  login </a>";
        }
    ?>
</html>