<?php
    require('./confBD.php');

    // Creamos un objeto que maneje todo lo relacionado con mySQLi
    $con = new mysqli();

    try {
        
        $con -> connect(IP, USER, PASS, 'prueba');

        // Creamos la sentencia
        $sql = 'update alumnos set edad = ?, nombre = ?  where id = ?';

        // Iniciamos la conexión
        $stmt = $con -> stmt_init();

        // Preparamos la consulta
        $stmt -> prepare($sql);

        $nombre = 'Raul';
        $edad = 35;
        $id = 9;

        // Establecemos los parametros. 'isi' -> Entero, String, Entero 
        $stmt -> bind_param('isi', $edad, $nombre, $id);

        // Ejecutar la consulta
        $stmt -> execute();

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
?>