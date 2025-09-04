<html>
    <form action="" method="post">
        <label for="usuario">Nome</label>
        <input type="text" name="usuario" value="">
        <label for="senha">Senha</label>
        <input type="password" name="senha" value="">
        <input type="submit" value="enviar">
    </form>

    <?php
        session_start();
        if( $_POST ){

            include "util.php";

            $conn = conecta();

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $select = $conn->prepare("SELECT nome FROM usuario WHERE (email = :usuario) and (senha = :senha)");

            $select->bindParam(":usuario",$usuario);
            $select->bindParam(":senha",$senha);

            $select->execute();

            $linha = $select->fetch();

            if( $linha != "" ){
                $_SESSION['sessaoConectado'] = true;
                $_SESSION['login'] = $linha['nome'];
                header("location: index.php");
            }

            else{
                $_SESSION['sessaoConectado'] = false;
                $_SESSION['login'] = "";
                echo "voce nao esta conectado";
            }
        }

    ?>

</html>