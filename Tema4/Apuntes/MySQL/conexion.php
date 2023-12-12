<?php

    require('./confBD.php');

    // Conectar a una base de datos (Host, Usuario, Contraseña, [BBDD, Puerto])
        // $con = mysqli_connect(IP,USER,PASS);

        // $con = mysqli_connect('192.168.7.100',USER,PASS); -> 1045
        // $con = mysqli_connect('192.168.7.100','asdadsa',PASS); -> 1045
        // $con = mysqli_connect(IP,USER,PASS,'SD'); -> 1049

    try {
        // Por si da fallo, para solucionarlo usar try catch
        $con = mysqli_connect(IP,USER,PASS,'prueba'); // No da fallo

        // echo "Se ha conectado ";

        // $rnombre = 'miguel\',20);drop table alumnos -> Para hacer el mal (Inyección de código)
        $rnombre = 'miguel';
        $redad = 30;
        
        // Guardamos la sentencia (poner nombre de las columnas (nombre,edad) anted de values || null o nombre de la columna en el id de values para que sea autoincremental)
            // $sql = "insert into alumnos (nombre,edad) values ('pepito',20, null)";
            // $sql = "insert into alumnos values ('pepito',20, null)";
        // $sql = "insert into alumnos (nombre,edad) values ('".$rnombre."','".$redad."')";
        
        // Para evitar que nos hagan el mal (Inyección de código), realizamos consultas preparadas evitando la línea anterior

        // Consultas preparadas
        $sql = "insert into alumnos (nombre,edad) values (?,?)";
        
        // Preparamos la sentencia
        $stmt = mysqli_prepare($con,$sql);

        // Introducimos los parametros en el statement
        mysqli_stmt_bind_param($stmt, 'si', $rnombre,$redad);

        // Ejecutamos el statement
        mysqli_stmt_execute($stmt);


        // Ejecutamos la sentencia
        //mysqli_query($con,$sql);      

        // Cerramos la conexion
        mysqli_close($con);

    } catch (\Throwable $th) {

        switch ($th -> getCode()) {

            case 1062:
                echo "Ha introducido el mismo id";
                break;

            case 111360:
                echo "El número de campos introducido no coincide";
                break;

            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;

            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;

            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;

            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;

            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;

            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            
            default:
                echo $th -> getMessage();
                break;
        }

        // echo mysqli_errno($con);

        // // Devuelve el código del error
        // echo mysqli_connect_errno();

        // // Devuelve una cadena
        // echo mysqli_connect_error();

        // Cerramos la conexion
        mysqli_close($con);
    }


?>