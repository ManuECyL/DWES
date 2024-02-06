<?php
    
    class PalabraDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findPalabra() {

            // $sql = "SELECT * FROM palabras ORDER BY RAND() LIMIT 1";
            $sql = "SELECT * FROM palabras";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_palabras = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($palabraStd = $result -> fetchObject()) {

                $palabra = new Palabra (
                    $palabraStd -> id_palabra,
                    $palabraStd -> palabra,
                    $palabraStd -> num_letras
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_palabras, $palabra);
            }
            
            // return de un array con todos los User
            return $array_palabras;
        }
    }

?>