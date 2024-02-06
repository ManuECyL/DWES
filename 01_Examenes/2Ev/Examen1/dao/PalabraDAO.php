<?php
    
    class PalabraDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findPalabraRand() {

            $sql = "SELECT * FROM palabras ORDER BY RAND() LIMIT 1";
            // $sql = "SELECT * FROM palabras";

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


        public static function findByNum($num) {

            if ($num == '') {
                $_SESSION['vista'] = VIEW . 'user.php';
                return;
            }

            $sql = "SELECT * FROM palabras WHERE num_letras >= ? ORDER BY RAND() LIMIT 1";

            // En findAll no se necesitan parámetros
            $parametros = array($num); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);

            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                $palabraStd = $result -> fetchObject();
    
                // Hay que crear una nueva palabra con todos los campos de la tabla de palabras
                $palabra = new Palabra (
                    $palabraStd -> id_palabra,
                    $palabraStd -> palabra,
                    $palabraStd -> num_letras
                );  
            
                // return de un objeto usuario 
                return $palabra;

            } else {
                // No muestra nada
                return null;
            }   
        }

        public static function findByPalabra($palabra) {

            $sql = "SELECT * FROM palabras WHERE palabra = ?";

            // En findAll no se necesitan parámetros
            $parametros = array($palabra); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);

            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                $palabraStd = $result -> fetchObject();
    
                // Hay que crear una nueva palabra con todos los campos de la tabla de palabras
                $palabra = new Palabra (
                    $palabraStd -> id_palabra,
                    $palabraStd -> palabra,
                    $palabraStd -> num_letras
                );
            
                // return de un objeto usuario 
                return $palabra;

            } else {
                // No muestra nada
                return null;
            }   
        }        
    }

?>