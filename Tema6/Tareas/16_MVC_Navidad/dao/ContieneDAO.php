<?php
    
    class ContieneDAO {

        public static function findAll() {

            $sql = "SELECT Compra.id_Usuario, Contiene.id_Compra, Contiene.cod_Prod, Productos.precio AS precio_Un, Contiene.cantidad, Contiene.total, DATE_FORMAT(Compra.fecha_Compra, '%d-%m-%Y') AS fecha_Compra
                    FROM Contiene 
                    JOIN Compra ON Contiene.id_Compra = Compra.id_Compra 
                    JOIN Productos ON Contiene.cod_Prod = Productos.cod_Prod
                    ORDER BY Compra.fecha_Compra DESC";

            // En findAll no se necesitan parámetros
            $parametros = array(); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_contiene = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($contieneStd = $result -> fetchObject()) {

                $contiene = new Contiene(
                    $contieneStd -> id_Compra,
                    $contieneStd -> cod_Prod,
                    $contieneStd -> cantidad,
                    $contieneStd -> total
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_contiene, $contiene);
            }
            
            // return de un array con todos los User
            return $array_contiene;
        }


        public static function findById($id) {

            $sql = "SELECT * FROM Contiene WHERE id_Compra = ?";

            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $contieneStd = $result -> fetchObject();

                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $contiene = new Contiene(
                    $contieneStd -> id_Compra,
                    $contieneStd -> cod_Prod,
                    $contieneStd -> cantidad,
                    $contieneStd -> total
                );
            
                // return de un objeto usuario 
                return $contiene;

            } else {
                // No muestra nada
                return null;
            }
        }


        public static function insert($contiene) {

            $sql = "INSERT INTO Contiene (id_Compra, cod_Prod, cantidad, total) VALUES(?,?,?,?)";

            // Lo mismo que lo instrucción siguiente, pero haciéndolo a mano
            $parametros = array(
                $contiene -> id_Compra, 
                $contiene -> cod_Prod, 
                $contiene -> cantidad, 
                $contiene -> total
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }


        public static function update($contiene) {

            $sql = "UPDATE Usuarios SET email = ?, fecha_Nacimiento = ? WHERE id_Usuario = ?";

            $parametros = array( 
                $contiene -> email, 
                $contiene -> fecha_Nacimiento,
                $contiene -> id_Usuario
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
                $usuario = new User(
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