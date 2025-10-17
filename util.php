<?php
    function conecta($params = "") {
        if (!is_array($params) || empty($params)) {
            $dsn = "pgsql:host=projetoscti.com.br;port=54432;dbname=eq4.ini2a";
            $user = "eq4.ini2a";
            $password = "eq42a639";
        } else {
            $dsn = $params["dsn"] ?? "pgsql:host=projetoscti.com.br;port=54432;dbname=eq4.ini2a";
            $user = $params["user"] ?? "eq4.ini2a";
            $password = $params["password"] ?? "eq42a639";
        }
        try {
            $varConn = new PDO($dsn, $user, $password);
            $varConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $varConn;
        } catch (PDOException $e) {
            echo "Não conectado: " . $e->getMessage(); 
            exit;
        }
    }

    function ValorSQL1 ($paramConn, $paramSQL) 
    {
      // com query vc nao passa parametros, apenas $conn e frase SQL  
      $select = $paramConn->query($paramSQL);
      $linha = $select->fetch();
      return $linha[0];
      
      /* a funcao precisa funcionar qquer q seja o campo que esta sendo pedido,
         nesse ponto vc nao saberá qual o nome do campo q deve retornar, 
         por isso, vc usa o indice ZERO -  a vantagem desse comando eh 
         receber um unico valor */
    }

    // segunda versao usando passagem e prepare internamente
    function ValorSQL2 ($paramConn, $paramSQL, $params) 
    {  
        /*
        Exemplo de uso 
        ------------------------------
        $valor_unitario = valorsql2($conn, "select valor_unitario from produto 
                                    where id_produto = :id_produto", 
                                    [ ["campo" => ":idproduto", 
                                       "valor" => $id_produto] ]);

        */
        $select = $paramConn->prepare($paramSQL);
        foreach($params as $param) { 
            /* cada linha lida é uma condicao:
               o nome do 'campo' e o 'valor do campo' 
               a cada iterao, carrega-se um bindParam */
            $select->bindParam($param['campo'], $param['valor']);
        }
        $select->execute();
        $linha = $select->fetch();

        return $linha[0]; 

        /* a funcao precisa funcionar qquer q seja o campo que esta sendo pedido,
           nesse ponto vc nao saberá qual o nome do campo q deve retornar, 
           por isso, vc usa o indice ZERO -  a vantagem desse comando eh 
           receber um unico valor */
    }
    
?>