<?php

class FactoryBD{
    
    public static function realizaConsulta($sql, $array_parametros){
        try{
            $con = new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
            $stmt = $con->prepare($sql);
            $stmt->execute($array_parametros);
           
        }catch(PDOException $e){
            $stmt = null;
            echo "Error: " . $e->getMessage();
        }
        return $stmt;
    
    }
}

?>