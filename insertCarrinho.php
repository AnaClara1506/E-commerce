<?php
    include "util.php";
    $conn = conecta();
    
    $session_id = $_SESSION['session_id'];
    
    function AtualizarGride($id_compra, $status){

    }



    /* Funcao ATUALIZAGRIDE($id_compra,$status)
    Mostra $id_compra
    Select DESCRICAO, VAL UNIT, QTD, SUB calculado
    de COMPRA_PRODUTO junção PRODUTO junção com COMPRA
    Onde ID_COMPRA seja $id_compra
    Para cada linha,
    Mostrar DESCRICAO, VAL UNIT, QTD, SUB
    Se $status for “CARRINHO”
    Mostrar “LINKS” incluir e excluir
    Fim
    Atribuir $total + SUB calculado a $total
    fim
    Mostra $total e $tatus
    Se SESSSAO[“STATUSCONECTADO”] e $total > 0 e $status = “CARRINHO”,
    Mostra link pro carrinho pra FECHAR
    fim
    // "LINKS" chamam o CARRINHO recursivamente passando
    // ID_PRODUTO e OPERACAO
    ---------------------------------------------------------
    // COMECA AQUI O PROGRAMA !
    Atribua SESSAO[“SESSION_ID”] a $session_id
    Receber parâmetros GET em $operacao e $id_produto
    Atribua “CARRINHO” a $status
    $qt recebe Select contagem de COMPRA Onde SESSAO = $session_id
    Atribua SESSAO[“LOGIN”] a $id_usuario
    Se $qt igual a 0
    Atribua data de hoje a $hoje
    Insert em COMPRA com $status, $hoje e $session_id
    Atribua lastInsertId() a $id_compra
    Senão
    Se (SESSAO [“STATUSCONECTADO”] != VERDADEIRO)
    Select ID_COMPRA, STATUS Onde ID_USUARIO = $id_usuario
    senao
    Select ID_COMPRA, STATUS Onde SESSAO = $session_id
    fim

    Atribua a $id_compra e $status, respectivamente
    fim
    Se SESSAO [“STATUSCONECTADO”] e $status = “CARRINHO”
    Update ID_USUARIO com $id_usuario em COMPRA
    Onde ID_US UARIO NULO
    Fim // se logado e compra pendente salva ID_USUARIO
    // TRATAMENTO DE OPERACOES RECURSIVO
    $quantidade recebe de Select QTD de PRODUTO
    Onde ID_PRODUTO for $id_produto
    Se $operacao for ‘INCLUIR’
    Se $quantidade = 0,
    Atribua $quantidade + 1 a $quantidade
    Insert em COMPRA_PRODUTO com $quantidade,
    $id_compra, $id_produto
    senao,
    Atribua $quantidade + 1 a $quantidade
    Update em COMPRA_PRODUTO com $quantidade e $id_produto
    Onde ID_COMPRA = $id_compra e ID_PRODUTO = $id_produto
    fim
    Chama ATUALIZAGRIDE($id_compra,$status)
    Senao se $operacao for ‘EXCLUIR’
    se $quantidade > 1,
    Update COMPRA_PRODUTO com quantidade - 1
    senao,
    DELETE registro
    fim
    Chama ATUALIZAGRIDE($id_compra,$status)
    Senao se $operacao for ‘FECHAR’
    Update COMPRA com STATUS = “RESERVADO”
    Onde ID_COMPRA = $id_compra
    Chama ATUALIZAGRIDE($id_compra,$status)
    senao // se chamar pela opcao carrinho no topo site
    Chama ATUALIZAGRIDE($id_compra,$status)
    Fim
    */
?>