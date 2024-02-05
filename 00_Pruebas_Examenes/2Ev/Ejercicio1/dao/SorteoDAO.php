<?php
    // Cada modelo tiene su DAO

    class SorteoDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM Sorteo";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_ = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($sorteoStd = $result -> fetchObject()) {

                $sorteo = new Sorteo (
                    $sorteoStd -> id_sorteo,
                    $sorteoStd -> fechasorteo,
                    $sorteoStd -> numero1,
                    $sorteoStd -> numero2,
                    $sorteoStd -> numero3,
                    $sorteoStd -> numero4,
                    $sorteoStd -> numero5
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_sorteos, $sorteo);
                
            }
            
            // return de un array con todos los User
            return $array_sorteos;
        }


        public static function findById($id_Sorteo) {

            $sql = "SELECT * FROM Sorteo WHERE id_Sorteo = ?";

            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id_Sorteo); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $sorteoStd = $result -> fetchObject();

                $sorteo = new Sorteo (
                    $sorteoStd -> id_sorteo,
                    $sorteoStd -> fechasorteo,
                    $sorteoStd -> numero1,
                    $sorteoStd -> numero2,
                    $sorteoStd -> numero3,
                    $sorteoStd -> numero4,
                    $sorteoStd -> numero5
                );
            
                return $sorteo;

            } else {
                // No muestra nada
                return null;
            }
        }

        public static function delete($usuario) {

            $sql = "UPDATE Usuario SET activo = false WHERE codUsuario = ?";

            $parametros = array($usuario -> codUsuario);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }
        }


        public static function comprobarSorteo($fechaSorteo) {

            $sql = "SELECT * FROM Sorteo WHERE fechaSorteo = ?";

            $parametros = array($fechaSorteo);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

        }
    }

?>