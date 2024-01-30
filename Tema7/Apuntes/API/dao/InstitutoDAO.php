<?php

    require('./modelo/Instituto.php');
    require('./dao/FactoryBD.php');

    class InstitutoDAO {

        public static function findAll() {

            $sql = "SELECT * FROM institutos";
    
            // En findAll no se necesitan parámetros
            $parametros = array(); 
    
            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
                        
            return $result -> fetchAll(PDO::FETCH_ASSOC);
        }

        public static function findById($id) {

            $sql = "SELECT * FROM institutos WHERE id = ?";
    
            $parametros = array($id); 
    
            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
                        
            return $result -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>