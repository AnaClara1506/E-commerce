<?php
    function conecta($params = "pgsql:host=localhost; port=5432; dbname=usuarios; user=postgres; password=postgres"){
        try{
            $conntemp = new PDO($params);
            return $conntemp;
        }
        catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
            
        }
    }



?>