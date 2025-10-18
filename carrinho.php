<?php
if ( session_status() !== PHP_SESSION_ACTIVE ){
//  ini_set('session.gc_maxlifetime', 7776000);
    session_start();
    
}

include 'util.php';
$conn = conecta();

if(!isset($_SESSION['statusconectado'])){
    $_SESSION['statusconectado'] = 1;
}

$id_usuario = $_SESSION['id_usuario'] ?? null;
$operacao = $_GET['operacao'] ?? null;
$status = 'carrinho';
$id_produto = $_GET['id_produto'] ?? null;
$session_id = session_id();

$id_compra = null;

// Inicializa a variável de mensagem
$mensagem_carrinho = null;

//Verifica se já existe compra para essa sessão
if ($id_usuario > 0) {
    $sql_compra = $conn->prepare("
        SELECT id_compra FROM compra 
        WHERE ((sessao = :sessao) OR (fk_usuario = :usuario)) 
        AND status = 'carrinho' 
        ORDER BY id_compra DESC 
        LIMIT 1
    ");
    $sql_compra->execute([':sessao' => $session_id, ':usuario' => $id_usuario]);
} else {
    // Usuário não logado, só busca carrinho SEM usuário associado
    $sql_compra = $conn->prepare("
        SELECT id_compra FROM compra 
        WHERE sessao = :sessao 
          AND status = 'carrinho' 
          AND fk_usuario IS NULL
        ORDER BY id_compra DESC 
        LIMIT 1
    ");
    $sql_compra->execute([':sessao' => $session_id]);
}


$compra = $sql_compra->fetch();

if ($compra) {
    $id_compra = $compra['id_compra'];
}

// Atualiza fk_usuario se logado
if($_SESSION['statusconectado'] && !empty($id_usuario)){
    $update = $conn->prepare("UPDATE compra SET fk_usuario = :id_usuario WHERE id_compra = :id_compra");
    $update ->execute(['id_usuario'=>$id_usuario, 'id_compra'=>$id_compra]);
}

// Se não existe, cria uma nova compra
if(!$id_compra){
    $insert = $conn->prepare("INSERT INTO compra (status, sessao) 
                            VALUES ('carrinho', :sessao)");
    $insert->execute(['sessao'=>$session_id]);
    $id_compra = $conn->lastInsertId();

    while($sql_compra->fetch()){
        $valor_sql = $conn->prepare("SELECT valor_unitario FROM produto WHERE id_produto = :id_produto");
        $valor_sql->execute(['id_produto' => $id_produto]);
        $valor_unitario = $valor_sql->fetchColumn();

        $insert_prod = $conn->prepare("INSERT INTO compra_produto (fk_compra, fk_produto, valor_unitario) 
                                VALUES (:id_compra, :id_produto, :valor_unitario)");
        $insert_prod->execute(['id_compra' => $id_compra,'id_produto' => $id_produto,'valor_unitario' => $valor_unitario]);
    }
    
}


//Operações recursivas
if($operacao){
    // Verifica se produto já está no carrinho
    $qtde_sql = $conn->prepare("SELECT quantidade FROM compra_produto WHERE fk_compra = :id_compra AND fk_produto = :id_produto");
    $qtde_sql->execute(['id_compra'=>$id_compra,'id_produto'=>$id_produto]);
    $quantidade = $qtde_sql->fetchColumn();

    if($operacao == 'incluir' && $id_produto){
        if(!$quantidade){
            $valor_sql = $conn->prepare("SELECT valor_unitario FROM produto WHERE id_produto = :id_produto");
            $valor_sql->execute(['id_produto' => $id_produto]);
            $valor_unitario = $valor_sql->fetchColumn();

            $insert_prod = $conn->prepare("INSERT INTO compra_produto (fk_compra, fk_produto, quantidade, valor_unitario) 
                                        VALUES (:id_compra, :id_produto, 1, :valor_unitario)");
            $insert_prod->execute(['id_compra' => $id_compra,'id_produto' => $id_produto,'valor_unitario' => $valor_unitario]);
        } else {
            $update_prod = $conn->prepare("UPDATE compra_produto SET quantidade = quantidade + 1 WHERE fk_compra = :id_compra AND fk_produto = :id_produto");
            $update_prod->execute(['id_compra'=>$id_compra,'id_produto'=>$id_produto]);
        }
    } elseif($operacao == 'excluir'  && $id_produto){
        if($quantidade > 1){
            $update_prod = $conn->prepare("UPDATE compra_produto SET quantidade = quantidade - 1 WHERE fk_compra = :id_compra AND fk_produto = :id_produto");
            $update_prod->execute(['id_compra'=>$id_compra,'id_produto'=>$id_produto]);
        } else {
            $delete_prod = $conn->prepare("DELETE FROM compra_produto WHERE fk_compra = :id_compra AND fk_produto = :id_produto");
            $delete_prod->execute(['id_compra'=>$id_compra,'id_produto'=>$id_produto]);
        }
    } elseif($operacao == 'fechar' && $id_compra){
        if(!empty($id_usuario)){
            $update_compra = $conn->prepare("UPDATE compra SET fk_usuario = :id_usuario, status = 'reservado' WHERE id_compra = :id_compra");
            $update_compra->execute(['id_usuario' => $id_usuario,'id_compra' => $id_compra]);

            if($update_compra->rowCount() > 0){
                $mensagem_carrinho = "Compra finalizada com sucesso!";
            } else {
                $mensagem_carrinho = "Falha ao atualizar o status da compra.";
            }
        } else {
            $mensagem_carrinho = "Você precisa estar logado para fechar a compra! <a href='login.php' class='texto-carrinho'>Fazer login</a>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Carrinho de compras</title> 
        <?php include 'cabecalho.php'; ?>
    </head>
    <body>
        <div class='container-carrinho'>
            <div>
                <br>
                <h1>Meu Carrinho</h1>
                <br>
                <?php
                    $compra = $conn->prepare("SELECT COUNT(*) FROM compra_produto WHERE fk_compra = :id_compra");
                    $compra->execute(['id_compra' => $id_compra]);
                    $qtde_compras = $compra->fetchColumn();

                    if($qtde_compras <= 0){
                        echo "<h2 class='texto-carrinho'> Nenhum produto adicionado ao carrinho ainda! </h2><br>";
                        echo "<a href='produtos.php' class='texto-carrinho'>Ver página de produtos</a>";
                    } 
                    else {
                        AtualizarGride($id_compra, $status, $mensagem_carrinho);
                    }
                ?>
            </div>
            <?php   
                function AtualizarGride($id_compra, $status, $mensagem_carrinho){
                    global $conn;
                    if(!$id_compra || !is_numeric($id_compra)){
                        echo "<br><h2>Nenhuma compra selecionada.</h2>";
                        return;
                    }

                    $sql = $conn->prepare("SELECT cp.*, p.nome, p.valor_unitario FROM compra_produto cp JOIN produto p ON cp.fk_produto = p.id_produto WHERE cp.fk_compra = :id_compra");
                    $sql->execute([':id_compra'=>$id_compra]);
                    $total = 0;
                    $qtde_total = 0;

                    echo "<div> <div class='table-responsiva'>";
                    echo "<table border='1' class='tabela-carrinho'>
                            <tr>
                                <th></th>
                                <th>Nome do produto</th>
                                <th>Valor Unitário</th>
                                <th>Quantidade</th>
                                <th>Subtotal</th>
                                <th></th>
                                <th></th>
                            </tr>";

                    while($linha = $sql->fetch()){
                        $subtotal = $linha['valor_unitario'] * $linha['quantidade'];
                        $total += $subtotal;
                        $qtde_total += $linha['quantidade'];
                        echo "<tr>";
                        echo "<td><img src='Imagens/c".$linha['fk_produto'].".jpg' width='100'></td>";
                        echo "<td>".$linha['nome']."</td>";
                        echo "<td>R$ ".$linha['valor_unitario']."</td>";
                        echo "<td>".$linha['quantidade']."</td>";
                        echo "<td>".$subtotal."</td>";
                        if($status == 'carrinho'){
                            echo "<td><a href='carrinho.php?operacao=incluir&id_produto=".$linha['fk_produto']."' class='button'> Incluir </a> </td>";
                            echo "<td><a href='carrinho.php?operacao=excluir&id_produto=".$linha['fk_produto']."' class='button'> Excluir </a> </td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table></div>";
                    echo "<br>
                    <h2> Resumo do pedido: </h2>
                    <br>
                    <div class='table-responsiva'>
                        <table border='1' class='tabela-resumo'>
                            <tr>
                                <th>Quantidade total</th>
                                <th>Valor final</th>
                            </tr>
                            <tr>
                                <td>".$qtde_total."</td>
                                <td>".$total."</td>
                        </table>
                    </div>";

                    
                    if (!is_null($mensagem_carrinho)) {
                        echo "<br><h3 class='texto-carrinho'>$mensagem_carrinho</h3><br>";
                    }
                    else{
                        if($_SESSION['statusconectado'] && $total > 0 && $status == 'carrinho'){
                            echo "<br><div class= 'botao'> 
                            <a href='carrinho.php?operacao=fechar' class='button'> Fechar compra </a>
                            </div>";
                        }
                    }

                    echo "</div>";
                }
            ?>
        </div>
        <br><br>
        <?php include 'rodape.php'; ?> 
        <script src="js/script.js"></script>
    </body>
</html>
