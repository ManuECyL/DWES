<?php
    
    class EstadisticaDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM estadisticas";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_estadisticas = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($estadisticaStd = $result -> fetchObject()) {

                $estadistica = new Estadistica (
                    $estadisticaStd -> id_estadistica,
                    $estadisticaStd -> id_usuario,
                    $estadisticaStd -> id_palabra,
                    $estadisticaStd -> resultado,
                    $estadisticaStd -> intentos,
                    $estadisticaStd -> fecha
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_estadisticas, $estadistica);
            }
            
            // return de un array con todos los User
            return $array_estadisticas;
        }
    }

?>