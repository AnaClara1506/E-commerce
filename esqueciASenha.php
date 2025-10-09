<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="box">
            <h1>Recuperar Senha</h1>
            <!-- para usar o "esqueci a senha"
                coloque um link pra esse arquivo no login.php 
                abaixo do form de login  -->

            <form action='' method='post'>
                <p>Enviar recuperacao da senha para: </p>
                <input type='email' name='email' class="textbox" placeholder="Insira o seu e-mail..."><br>
                <input type='submit' value='Enviar' class="button">
            </form>
        <?php
            include "util.php";
            include "emails.php";
            if ( $_POST ) {   
                /*
                    O usuario devera saber qual eh o seu email 
                    para poder receber um link de recuperacao.
                    O link de recuperacao eh uma chamada GET para um codigo php
                    que vai receber um token, o token recebido na vdd eh a senha antiga 
                    criptografada que foi obtida do email valido informado. 
                    Essa senha sera trocada em redefinir.php.
                    Ao receber o token e verificar se bate com a senha atual, 
                    estamos assegurando que nao houve uma tentativa de quebra de seguranca. 
                    Ai o programa pede nova senha e altera      
                */
                $conn = conecta();
                $email = $_POST['email'];
                $select = $conn->prepare("select nome,senha from usuario where email=:email ");
                $select->bindParam(':email',$email);
                $select->execute();
                $linha = $select->fetch();
                
                if ( $linha ) {
                    
                    $token = $linha['senha']; 
                    
                    $nome = $linha['nome'];
                    
                    $seusite = "eq4.ini2a"; 
                    
                    $html="<h2>Redefinir sua senha</h2><br>
                        <p><b>Oi $nome</b></p>, <br>
                        <h3>Clique no link para redefinir sua senha:<br></h3>
                        <p> http://$seusite.projetoscti.com.br/redefinir.php?token=$token </p>";
                    
                    // guarda o email pra recuperar a senha em redefinir.php
                    $_SESSION["email"] = $email;

                    if ( EnviaEmail ( $email, '* Recupere a sua senha !! *', $html ) ) {
                        echo "<p><br><b>Email enviado com sucesso</b> (verifique sua caixa de spam se nao encontrar)</p>";
                    }   

                } else {
                    echo "<p>Email não cadastrado</p>";
                }

                echo "<br><a href='login.php' class='button' >Voltar</a>";
            }
            echo "</div>"
        ?>
    </body>
</html>