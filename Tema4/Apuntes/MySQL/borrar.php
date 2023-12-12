<?php
    require('./confBD.php');


    try {
        // Por si da fallo, para solucionarlo usar try catch
        $con = mysqli_connect(IP,USER,PASS,'prueba'); // No da fallo

        // Creamos la sentencia
        $sql = 'delete from alumnos where id >= 2';

        // Ejecutamos la sentencia
        $result = mysqli_query($con,$sql);
        
        // Muestra el número de los registros eliminados
        echo mysqli_affected_rows($con);

        // Cerramos la conexion
        mysqli_close($con);

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