<?php
    require('./confBD.php');


    try {
        // Por si da fallo, para solucionarlo usar try catch
        $con = mysqli_connect(IP,USER,PASS,'prueba'); // No da fallo

        // Creamos la sentencia
        $sql = 'select * from alumnos';

        // Ejecutamos la sentencia
        $result = mysqli_query($con,$sql);
        
        while ($array = mysqli_fetch_all($result, MYSQLI_BOTH)) {
            echo "<pre>";
            print_r($array);
        }

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