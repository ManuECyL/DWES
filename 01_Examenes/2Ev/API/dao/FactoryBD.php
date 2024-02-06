<?php

    require('./config/confBD.php');

    // Todos lo referido a la conexión de la BBDD
    class FactoryBD {

        // Parámetros: consulta SQL y los parámetros para realizar el statement que se guardarán en un array
        public static function realizaConsulta($sql, $array_parametros) {

            try {
                // Conexión a la BBDD
                $conn = new PDO("mysql:host=".IP.";dbname=".BBDD,USER,PASS);

                // Preparamos el statement y lo ejecutamos
                $stmt = $conn -> prepare($sql);
                $stmt -> execute($array_parametros);


            } catch (PDOException $e) {
                // Si ha habido un error lo igualamos a null para que el return $stmt no de fallo
                // $stmt = null;

                // Muestra el mensaje de error y cierra la conexión
                Base::response('HTTP/1.0 500 Error interno del servidor', $e -> getMessage()); // En un futuro cambiar $e -> getMessage() para no mostrar toda la información al usuario

                unset($conn);
            }

            return $stmt;

        }
    }

?>