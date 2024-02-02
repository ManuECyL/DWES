<?php
    // Todos lo referido a la conexión de la BBDD

    class FactoryBD {

        // Parámetros: consulta SQL y los parámetros para realizar el statement que se guardarán en un array
        public static function realizaConsulta($sql, $array_parametros) {

            try {
                // Conexión a la BBDD
                $conn = new PDO("mysql:host=".IP.";dbname=".BD,USER,PASS);

                // Preparamos el statement y lo ejecutamos
                $stmt = $conn -> prepare($sql);
                $stmt -> execute($array_parametros);


            } catch (PDOException $e) {
                // Si ha habido un error lo igualamos a null para que el return $stmt no de fallo
                $stmt = null;

                // Muestra el mensaje de error y cierra la conexión
                // echo $e -> getMessage();
                unset($conn);
            }

            return $stmt;

        }
    }

?>