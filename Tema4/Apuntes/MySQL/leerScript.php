<?php

    require('./confBD.php');

    $con = new mysqli();

    try {
        // Conectamos a la BBDD
        $con -> connect(IP,USER,PASS);

        // Obtenemos el contenido del fichero sql
        $script = file_get_contents("./banco.sql");

        // Lee el contenido del script
        $con -> multi_query($script);
            
        // Comprobamos si hay un error de sintaxis y no lo muestra
        do {
            $con -> store_result();

            if (!$con -> next_result()) {
                break;
            }

        } while(true);

        // Cerramos la conexion
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