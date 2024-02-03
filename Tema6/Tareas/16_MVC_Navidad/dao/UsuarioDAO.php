<?php
    // Cada modelo tiene su DAO

    class UsuarioDAO {

        // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
        public static function findAll() {

            $sql = "SELECT * FROM Usuarios";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_usuarios = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($usuarioStd = $result -> fetchObject()) {

                $usuario = new Usuario(
                    $usuarioStd -> id_Usuario,
                    $usuarioStd -> contraseña,
                    $usuarioStd -> email,
                    $usuarioStd -> fecha_Nacimiento,
                    $usuarioStd -> rol
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_usuarios, $usuario);
            }
            
            // return de un array con todos los User
            return $array_usuarios;
        }


        public static function findById($id) {

            $sql = "SELECT * FROM Usuarios WHERE id_Usuario = ?";

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
                    $usuarioStd -> id_Usuario,
                    $usuarioStd -> contraseña,
                    $usuarioStd -> email,
                    $usuarioStd -> fecha_Nacimiento,
                    $usuarioStd -> rol
                );
            
                // return de un objeto usuario 
                return $usuario;

            } else {
                // No muestra nada
                return null;
            }
        }


        public static function insert($usuario) {

            $fechaOriginal = $usuario -> fecha_Nacimiento;
            $fechaObjeto = DateTime::createFromFormat('d-m-Y', $fechaOriginal);
            $fechaFormateada = $fechaObjeto -> format('Y-m-d');

            $sql = "INSERT INTO Usuarios (id_Usuario, contraseña, email, fecha_Nacimiento, rol) VALUES(?,?,?,?,?)";

            // Lo mismo que lo instrucción siguiente, pero haciéndolo a mano
            $parametros = array(
                $usuario -> id_Usuario, 
                $usuario -> contraseña, 
                $usuario -> email, 
                $fechaFormateada,
                $usuario -> rol
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }


        public static function update($usuario) {

            $sql = "UPDATE Usuarios SET email = ?, fecha_Nacimiento = ? WHERE id_Usuario = ?";

            $parametros = array( 
                $usuario -> email, 
                $usuario -> fecha_Nacimiento,
                $usuario -> id_Usuario
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }


        public static function cambioContraseña($contraseña, $id_Usuario) {

            $sql = "UPDATE Usuarios SET contraseña = ? WHERE id_Usuario = ?";

            // $password = sha1($password);

            $parametros = array($contraseña, $id_Usuario);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result) {
                return true;
            }

            return false;
        }


        public static function borrar($usuario) {

            $sql = "DELETE FROM Usuarios WHERE id_Usuario = ?";

            $parametros = array($usuario -> id_Usuario);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }
        }

        public static function validarUser($nombre, $pass) {

            $sql = "SELECT * FROM Usuarios WHERE id_Usuario = ? AND contraseña = ?";

            // $pass = sha1($pass);

            $parametros = array($nombre, $pass); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $usuarioStd = $result -> fetchObject();

                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $usuario = new Usuario(
                    $usuarioStd -> id_Usuario,
                    $usuarioStd -> contraseña,
                    $usuarioStd -> email,
                    $usuarioStd -> fecha_Nacimiento,
                    $usuarioStd -> rol
                );
                                                    
                return $usuario;                    
            
            } else {
                // No muestra nada
                return null;
            }
        }

    }

?>