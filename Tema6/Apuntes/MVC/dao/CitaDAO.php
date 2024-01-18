<?php

    class CitaDAO {

        public static function findAll() {

            $sql = "SELECT * FROM Cita";
    
            // En findAll no se necesitan parámetros
            $parametros = array(); 
    
            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_citas = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($citaStd = $result -> fetchObject()) {
    
                $cita = new Cita(
                    $citaStd -> id,
                    $citaStd -> especialista,
                    $citaStd -> motivo,
                    $citaStd -> fecha,
                    $citaStd -> activo,
                    $citaStd -> paciente
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_citas, $cita);

            }
            
            // return de un array con todos los User
            return $array_citas;
        }

        public static function findById($id) {
    
            $sql = "SELECT * FROM Cita WHERE id = ?";
    
            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id); 
    
            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {
    
                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $citaStd = $result -> fetchObject();
    
                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $cita = new Cita(
                    $citaStd -> id,
                    $citaStd -> especialista,
                    $citaStd -> motivo,
                    $citaStd -> fecha,
                    $citaStd -> activo,
                    $citaStd -> paciente
                );
                                                                
            } else {
                // No muestra nada
                return null;
            }
            
            // return de un objeto usuario 
            return $cita;
        }


        public static function insert($cita) {

            $sql = "INSERT INTO Cita (especialista,motivo,fecha,activo,paciente) VALUES (?,?,?,?,?)";

            $parametros = array(
                $cita -> especialista, 
                $cita -> motivo, 
                $cita -> fecha, 
                $cita -> activo,
                $cita -> paciente
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }

        public static function update($cita) {
    
            $sql = "UPDATE Cita SET especialista = ?, motivo = ?, fecha = ?, paciente = ? WHERE id = ?";
    
            $parametros = array( 
                $cita -> especialista, 
                $cita -> motivo, 
                $cita -> fecha, 
                $cita -> paciente,
                $cita -> id
            );
    
            $result = FactoryBD::realizaConsulta($sql, $parametros);
    
            if ($result -> rowCount() > 0) {
                return true;
            }
    
            return false;
        }


        public static function delete($cita) {

            $sql = "UPDATE Cita SET activo = false WHERE id = ?";

            $parametros = array($cita -> id);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }
        }


        public static function findByPaciente($usuario) {
    
            $sql = "SELECT * FROM Cita WHERE paciente = ? AND activo = 1 AND fecha > now() ORDER BY fecha";
    
            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($usuario -> codUsuario); 
    
            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_citas = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($citaStd = $result -> fetchObject()) {
    
                $cita = new Cita(
                    $citaStd -> id,
                    $citaStd -> especialista,
                    $citaStd -> motivo,
                    $citaStd -> fecha,
                    $citaStd -> activo,
                    $citaStd -> paciente
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_citas, $cita);
            }
            
            // return de un array con todos los User
            return $array_citas;
        }


        public static function findByPacienteH($usuario) {
    
            $sql = "SELECT * FROM Cita WHERE paciente = ? AND activo = 1 AND fecha < now() ORDER BY fecha DESC";
    
            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($usuario -> codUsuario); 
    
            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Aquí guardaremos el array de la consulta
            $array_citas = array();
            
            // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
            while ($citaStd = $result -> fetchObject()) {
    
                $cita = new Cita(
                    $citaStd -> id,
                    $citaStd -> especialista,
                    $citaStd -> motivo,
                    $citaStd -> fecha,
                    $citaStd -> activo,
                    $citaStd -> paciente
                );
                
                // Añadimos cada usuario al array de usuarios
                array_push($array_citas, $cita);
                
            }
            
            // return de un array con todos los User
            return $array_citas;
        }
    }


?>