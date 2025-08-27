<?php
function conecta($params = "") {
    if (!is_array($params) || empty($params)) {
        $dsn = "pgsql:host=localhost;port=5432;dbname=Usuarios";
        $user = "postgres";
        $password = "postgres";
    } else {
        $dsn = $params["dsn"] ?? "pgsql:host=localhost;port=5432;dbname=Usuarios";
        $user = $params["user"] ?? "postgres";
        $password = $params["password"] ?? "postgres";
    }
    try {
        $varConn = new PDO($dsn, $user, $password);
        $varConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $varConn;
    } catch (PDOException $e) {
        echo "Não conectado: " . $e->getMessage(); // Mostrar mensagem do erro
        exit;
    }
}
?>