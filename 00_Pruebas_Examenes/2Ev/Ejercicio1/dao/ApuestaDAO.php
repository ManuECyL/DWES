<?php
    // Cada modelo tiene su DAO

    class ApuestaDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM Apuesta";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_apuestas = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($apuestaStd = $result -> fetchObject()) {

                $apuesta = new Apuesta (
                    $apuestaStd -> id_Apuesta,
                    $apuestaStd -> id_Usuario,
                    $apuestaStd -> numero1,
                    $apuestaStd -> numero2,
                    $apuestaStd -> numero3,
                    $apuestaStd -> numero4,
                    $apuestaStd -> numero5,
                    $apuestaStd -> fechaApuesta
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_apuestas, $apuesta);
                
                // Para visualizar el resultado
                print_r($apuesta);
            }
            
            // return de un array con todos los User
            return $array_apuestas;
        }


        public static function findById($id_Usuario) {

            $sql = "SELECT * FROM Apuesta WHERE id_Usuario = ?";

            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id_Usuario); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $apuestaStd = $result -> fetchObject();

                $apuesta = new Apuesta (
                    $apuestaStd -> id_Apuesta,
                    $apuestaStd -> id_Usuario,
                    $apuestaStd -> numero1,
                    $apuestaStd -> numero2,
                    $apuestaStd -> numero3,
                    $apuestaStd -> numero4,
                    $apuestaStd -> numero5,
                    $apuestaStd -> fechaApuesta
                );
            
                return $apuesta;

            } else {
                // No muestra nada
                return null;
            }
        }


        public static function update($usuario) {

            $sql = "UPDATE Usuario SET descUsuario = ?, perfil = ?, fechaUltimaConexion = ? WHERE codUsuario = ?";

            $parametros = array( 
                $usuario -> descUsuario, 
                $usuario -> perfil,
                $usuario -> fechaUltimaConexion,
                $usuario -> codUsuario
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }


        public static function delete($usuario) {

            $sql = "UPDATE Usuario SET activo = false WHERE codUsuario = ?";

            $parametros = array($usuario -> codUsuario);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }
        }


        public static function hacerApuesta($apuesta) {

            // Comprobamos si se ha realizado el sorteo
            $sorteoRealizado = SorteoDAO::comprobarSorteo($apuesta -> fechaApuesta);

            if ($sorteoRealizado) {
                throw new Exception("El sorteo ya se ha realizado, no se pueden hacer más apuestas");
            }

            // Pasar la variable $sorteoRealizado a la vista
            require_once('views/apuesta.php');

            $apuestaRealizada = self::findById($_SESSION['usuario'] -> id_Usuario);

            // Si el usuario ya ha realizado una apuesta y intenta insertar la misma, se lanza una excepción
            if ($apuestaRealizada) {
                throw new Exception("Ya has realizado esta apuesta");
            
            } else {
                $sql = "INSERT INTO Apuesta (id_Usuario, numero1, numero2, numero3, numero4, numero5, fechaApuesta) VALUES(?,?,?,?,?,?,?)";

                $parametros = array(
                    $apuesta -> id_Usuario,
                    $apuesta -> numero1,
                    $apuesta -> numero2,
                    $apuesta -> numero3,
                    $apuesta -> numero4,
                    $apuesta -> numero5,
                    $apuesta -> fechaApuesta
                );
            }

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }
    }

?>