<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
            <div class="box">
                <h1>Login do Usuário</h1>
                <form action="" method="post">
                    <input type="email" name='usuario' class="textbox" placeholder="Insira o seu email..." required>
                    <input type="password" name='senha' class="textbox" placeholder="Insira a sua senha... (8 dígitos)" required>
                    <a href="esqueciASenha.php">Esqueci a senha?</a><br>
                    <input type="submit" class="button" value="Entrar"><br> 
                </form>
            <div class='login-invalido'>
    </body>
    <?php
        if ( $_POST ) {
            include "util.php";
            if ( session_status() !== PHP_SESSION_ACTIVE ){
                ini_set('session.gc_maxlifetime', 7776000);
                session_start();
            }
            $session_id = session_id();

            $usuario = $_POST['usuario'];
            $conn = conecta();

			$select = $conn->prepare("select id_usuario, nome,senha,admin,excluido
                                      from usuario 
                                      where email=:usuario");

            $select->bindParam(":usuario",$usuario);

            $senha   = $_POST['senha'];

            $select->execute();
            $linha = $select->fetch();
            if($linha && !$linha['excluido']){
                if ( password_verify($senha,$linha['senha']) ) {
                    $_SESSION['statusConectado'] = true;
                    $_SESSION['admin'] = $linha['admin'];
                    $_SESSION['login'] = $linha['nome'];
                    $_SESSION['id_usuario'] = $linha['id_usuario'];

                    // Carrinho: migrar carrinho da sessão para o usuário logado
                    $id_usuario = $linha['id_usuario'];
                    $carrinho_sessao = $conn->prepare("
                        SELECT * FROM compra 
                        WHERE sessao = :sessao 
                        AND status = 'carrinho' 
                        AND fk_usuario IS NULL
                        ORDER BY id_compra DESC LIMIT 1
                    ");
                    $carrinho_sessao->execute([':sessao' => $session_id]);
                    $compra_sessao = $carrinho_sessao->fetch();

                    if ($compra_sessao) {
                        $id_compra_sessao = $compra_sessao['id_compra'];

                        // Verifica se já existe carrinho ativo para o usuário
                        $carrinho_usuario = $conn->prepare("
                            SELECT * FROM compra 
                            WHERE fk_usuario = :id_usuario 
                            AND status = 'carrinho'
                            ORDER BY id_compra DESC LIMIT 1
                        ");
                        $carrinho_usuario->execute([':id_usuario' => $id_usuario]);
                        $compra_usuario = $carrinho_usuario->fetch();

                        if ($compra_usuario) {
                            $id_compra_usuario = $compra_usuario['id_compra'];

                            // Mover os produtos do carrinho da sessão para o do usuário
                            $itens = $conn->prepare("
                                SELECT * FROM compra_produto 
                                WHERE fk_compra = :id_compra
                            ");
                            $itens->execute([':id_compra' => $id_compra_sessao]);
                            while ($item = $itens->fetch()) {
                                // Verifica se o produto já está no carrinho do usuário
                                $verifica = $conn->prepare("
                                    SELECT quantidade FROM compra_produto 
                                    WHERE fk_compra = :compra_usuario 
                                    AND fk_produto = :produto
                                ");
                                $verifica->execute([
                                    ':compra_usuario' => $id_compra_usuario,
                                    ':produto' => $item['fk_produto']
                                ]);
                                $qtde_existente = $verifica->fetchColumn();

                                if ($qtde_existente) {
                                    // Atualiza a quantidade
                                    $update = $conn->prepare("
                                        UPDATE compra_produto 
                                        SET quantidade = quantidade + :qtde 
                                        WHERE fk_compra = :compra AND fk_produto = :produto
                                    ");
                                    $update->execute([
                                        ':qtde' => $item['quantidade'],
                                        ':compra' => $id_compra_usuario,
                                        ':produto' => $item['fk_produto']
                                    ]);
                                } else {
                                    // Insere o produto
                                    $insert = $conn->prepare("
                                        INSERT INTO compra_produto (fk_compra, fk_produto, quantidade, valor_unitario)
                                        VALUES (:compra, :produto, :qtde, :valor)
                                    ");
                                    $insert->execute([
                                        ':compra' => $id_compra_usuario,
                                        ':produto' => $item['fk_produto'],
                                        ':qtde' => $item['quantidade'],
                                        ':valor' => $item['valor_unitario']
                                    ]);
                                }
                            }

                            // Exclui a compra da sessão
                            $delete_itens = $conn->prepare("DELETE FROM compra_produto WHERE fk_compra = :id");
                            $delete_itens->execute([':id' => $id_compra_sessao]);

                            $delete_compra = $conn->prepare("DELETE FROM compra WHERE id_compra = :id");
                            $delete_compra->execute([':id' => $id_compra_sessao]);
                        } else {
                            // Só vincula a compra da sessão ao usuário
                            $vincular = $conn->prepare("
                                UPDATE compra 
                                SET fk_usuario = :id_usuario 
                                WHERE id_compra = :id_compra
                            ");
                            $vincular->execute([
                                ':id_usuario' => $id_usuario,
                                ':id_compra' => $id_compra_sessao
                            ]);
                        }
                    }


                    header("location: index.php");   
                    echo "</div> </div>";
                } else {
                    $_SESSION['statusConectado'] = false;
                    $_SESSION['admin'] = false;
                    $_SESSION['login'] = "";
                    echo "Senha Inválido! Redigite! </div></div>";
                }         
            }
            else {
                echo "Usuário não existe! <br>";
                echo "<a href='cadastrar.php'>Clique aqui</a> para cadastrar-se!</div></div>";
            }              
        }       
    ?>

</html>