<?php
    // Cada modelo tiene su DAO

    class UserDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM Usuario";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_usuarios = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($usuarioStd = $result -> fetchObject()) {

                $usuario = new User($usuarioStd -> codUsuario,
                    $usuarioStd -> password,
                    $usuarioStd -> descUsuario,
                    $usuarioStd -> fechaUltimaConexion,
                    $usuarioStd -> perfil);
                                    
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_usuarios, $usuario);
                
                // Para visualizar el resultado
                    print_r($usuario);
            }
            
            // return de un array con todos los User
            return $array_usuarios;
        }


        public static function findById($id) {

            $sql = "SELECT * FROM Usuario WHERE codUsuario = ?";

            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $usuarioStd = $result -> fetchObject();

                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $usuario = new User($usuarioStd -> codUsuario,
                    $usuarioStd -> password,
                    $usuarioStd -> descUsuario,
                    $usuarioStd -> fechaUltimaConexion,
                    $usuarioStd -> perfil);
                                                    
                // Para visualizar el resultado
                    print_r($usuario);
            
            } else {
                // No muestra nada
                return null;
            }
            
            // return de un objeto usuario 
            return $usuario;
        }


        public static function insert($usuario) {

            $sql = "INSERT INTO Usuario (codUsuario,password,descUsuario,fechaUltimaConexion) VALUES(?,?,?,?)";

            // Convierte un objeto en un array colocando delante de la variable $usuario, que contiene un objeto, entre paréntesis la palabra array 
            $parametros = (array)$usuario;

            // Como $parametros guarda todos los campos de la tabla Usuario que existen en el objeto $usuario, debemos quitar los campos que no desamos de esta forma
            unset($parametros['User perfil']);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            return true;
        }
    }

?>