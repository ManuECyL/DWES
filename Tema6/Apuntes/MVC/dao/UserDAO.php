<?php
    // Cada modelo tiene su DAO

    class UserDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM Usuario";
            $parametros = array();  // En findAll no se necesitan parámetros, pero hay que pasarle algo para que no de error

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_usuarios = array();
            
            // Recorre el resultado guardandolo en un array de Objetos y este array se guarda en la variable $usuario
            while ($usuario = $result -> fetchObject()) {
                echo "<pre>";
                    print_r($usuario);
                echo "</pre>";
            }
            
            // return de un array con todos los User
            return $array_usuarios;
        }

        public static function findById() {

            // return de un objeto usuario 
        }
    }

?>