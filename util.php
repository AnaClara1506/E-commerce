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
?>