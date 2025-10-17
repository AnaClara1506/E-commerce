<?php
    if ( session_status() !== PHP_SESSION_ACTIVE ){
        ini_set('session.gc_maxlifetime', 7776000);
        session_start();
    }
    $session_id = session_id();
    include "util.php";
    $conn = conecta();
    
    $varSQL ="insert into usuario (nome, email, senha, telefone)
            values (:nome, :email, :senha, :telefone)";
        
    if($_POST['senha'] != $_POST['senha-confirmacao']){
        header('Location: cadastrar.php?erro=senha');
    }
    else{
        $senha = $_POST['senha'];
        $senhaCripto = password_hash($senha,PASSWORD_DEFAULT);
        $insert = $conn->prepare($varSQL);
        $insert->bindParam(':nome', $_POST['nome']);
        $insert->bindParam(':email', $_POST['email']);
        $insert->bindParam(":senha",$senhaCripto);
        $insert->bindParam(':telefone', $_POST['telefone']);
        $insert->execute();
    
        //Entrando na conta automaticamente
        $email = $_POST['email'];

		$select = $conn->prepare("select id_usuario, nome,senha,admin,excluido
                                      from usuario 
                                      where email=:email");

        $select->bindParam(":email",$email);
        $senha = $_POST['senha'];

        $select->execute();
        $linha = $select->fetch();
         if($linha){
            $_SESSION['statusConectado'] = true;
            $_SESSION['admin'] = $linha['admin'];
            $_SESSION['login'] = $linha['nome'];
            $_SESSION['id_usuario'] = $linha['id_usuario'];
            header("location: index.php");   
         }
    }
?>