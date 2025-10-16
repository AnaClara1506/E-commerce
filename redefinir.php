<html>
     <link rel="stylesheet" href="css/login.css">
     <div class='box'>
          <h1>Redefinir a senha</h1>
          <form action='' method='post'>  
               <p>Senha (8 digitos)</p>
               <input type='password' name='senha1' minlength='8' maxlength='8' placeholder="Insira a nova senha... " class="textbox"><br>
               <p>Redigite a senha</p>
               <input type='password' name='senha2' minlength='8' maxlength='8' placeholder="Confirme a nova senha... " class="textbox"><br>                
               <input type='submit' value='Alterar' class="button">
          </form>
     </div>

     <?php

          include "util.php";
          
          session_start();

          if ( $_POST ) {  

               $conn = conecta();
     
               // recebe senhas do form 
               $senha1 = $_POST['senha1'];
               $senha2 = $_POST['senha2'];
               
               // recupera o email salvo como var sessao em esqueci.php
               $token = $_GET['token'];
               $email = $_SESSION["email"];

               // obtem a senha do banco
               $sql = "select senha from usuario where email='$email'";              
               $senha = ValorSQL1($conn, $sql);     
               
               // confere se o token eh VERDADEIRO
               if ( $senha == $token )  {
                    if ( $senha1 == $senha2 ) {
                         $senha1 = password_hash($senha1,PASSWORD_DEFAULT);
                         ExecutaSQL($conn, "update usuario set senha='$senha1' where email='$email'");
                         echo "<p><br>Senha alterada com sucesso !!</p>";
                    } else {
                         echo "<p><br>Senhas estão diferentes</p>";
                    }
               } else {
                    echo "<br>Token invalido !!<br>";
               }
          
               // se o preenchimento da nova senha esta correto
               // atualiza a senha do usuario !!!
               

               echo "<br><br><a href='login.php'>Login</a>";
          }
     ?>  
</html>
