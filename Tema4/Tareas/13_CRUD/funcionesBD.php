<?php
    require('./conexionBD.php');

    // Creamos un objeto que maneje todo lo relacionado con mySQLi
    $con = new mysqli();

    try {
        // Iniciamos la conexion
        $con -> connect(IP, USER, PASS);

      

        // Cerrar la conexion
        $con -> close();


    } catch (\Throwable $th) {

        switch ($th -> getCode()) {

            case '1062':
                echo "Ha introducido el mismo id";
                break;

            case '111360':
                echo "El número de campos introducido no coincide";
                break;
            
            default:
                echo $th -> getMessage();
                break;
        }

        mysqli_close($con);
    }



    function consultarBD($con) {

        // Creamos la sentencia
        $sql = "select * from videojuegos";

        // Ejecutamos la sentencia
        $result = $con -> query($sql);

        return $result;
    }


    function actualizarBD($con, $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento) {
        // Creamos la sentencia
        $sql = 'update alumnos set edad = ?, nombre = ?  where id = ?';

        // Iniciamos la conexión
        $stmt = $con -> stmt_init();

        // Preparamos la consulta
        $stmt -> prepare($sql);

        $nombre = 'Raul';
        $edad = 35;
        $id = 9;

        // Establecemos los parametros. 'sssid' -> String, String, String, Entero, Double  
        $stmt -> bind_param('sssid', $edad, $nombre, $id);

        // Ejecutar la consulta
        $stmt -> execute();
    }

?>