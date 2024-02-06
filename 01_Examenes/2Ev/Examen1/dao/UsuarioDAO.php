<?php
    // Cada modelo tiene su DAO

    class UsuarioDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM usuarios";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_usuarios = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($usuarioStd = $result -> fetchObject()) {

                $usuario = new Usuario(
                    $usuarioStd -> id_usuario,
                    $usuarioStd -> username,
                    $usuarioStd -> password,
                    $usuarioStd -> tipo
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_usuarios, $usuario);

            }
            
            // return de un array con todos los User
            return $array_usuarios;
        }


        public static function findById($id) {

            $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";

            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $usuarioStd = $result -> fetchObject();

                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $usuario = new Usuario(
                    $usuarioStd -> id_usuario,
                    $usuarioStd -> username,
                    $usuarioStd -> password,
                    $usuarioStd -> tipo
                );
            
                // return de un objeto usuario 
                return $usuario;

            } else {
                // No muestra nada
                return null;
            }
        }

        public static function validarUser($nombre, $pass) {

            $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";

            $pass = sha1($pass);

            $parametros = array($nombre, $pass); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $usuarioStd = $result -> fetchObject();

                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $usuario = new Usuario(
                    $usuarioStd -> id_usuario,
                    $usuarioStd -> username,
                    $usuarioStd -> password,
                    $usuarioStd -> tipo
                );
                                                    
                return $usuario;                    
            
            } else {
                // No muestra nada
                return null;
            }
        }


        public static function buscarPorNombre($nombre) {

            // LIKE para que contenga parte del nombre
            $sql = "SELECT * FROM usuarios WHERE username LIKE ?";

            $nombre = '%'. $nombre .'%';

            $parametros = array($nombre); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
                        
            if($result->rowCount()==1){
                $usuarioStd  = $result->fetchObject();
                $usuario = new Usuario(
                    $usuarioStd -> id_usuario,
                    $usuarioStd -> username,
                    $usuarioStd -> password,
                    $usuarioStd -> tipo
                );
                return $usuario;

            //return 1 objeto usuario
            } else {
                return null;
            }
        }

    }

?>