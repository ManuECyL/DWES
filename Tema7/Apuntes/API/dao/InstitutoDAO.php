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

        public static function findByFiltros($filtros) {

            $num = count($filtros);

            $parametros = array();
                           
            $sql = "SELECT * FROM institutos WHERE ";

            foreach ($filtros as $key => $value) {
                
                if ($key == 'nombre') {
                    $sql .= $key . " LIKE ?";
                    $valor = '%' . $value . '%';
                    array_push($parametros, $valor);
                    
                } else {
                    $sql .= $key . " = ?";
                    array_push($parametros, $value);
                }

                if ($num == 2) {
                    $num --; // Reducimos el valor de $num, para que la sentencia AND solo se ejecute una vez, ya que la siguiente vez no se cumpliría la condición al ser $num = 1 
                    $sql .= ' AND ';
                }
            }

            $result = FactoryBD::realizaConsulta($sql, $parametros);
                        
            return $result -> fetchAll(PDO::FETCH_ASSOC);
        }

        public static function insert($instituto) {
                           
            $sql = "INSERT INTO institutos VALUES (null, ?, ?, ?) ";

            $parametros = array(
                $instituto -> nombre,
                $instituto -> localidad,
                $instituto -> telefono
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }                
        }

        public static function findLast() {
            
            $sql = "SELECT * FROM institutos ORDER BY id DESC LIMIT 1";

            $parametros = array();

            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            return $result -> fetchAll(PDO::FETCH_ASSOC);
        }

        public static function update($instituto) {
                           
            $sql = "UPDATE institutos SET nombre = ?, localidad = ?, telefono = ? WHERE id = ? ";

            $parametros = array(
                $instituto -> nombre,
                $instituto -> localidad,
                $instituto -> telefono,
                $instituto -> id
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }                
        }

    }

?>