<?php
    require('./conexionBD.php');

    // Creamos un objeto que maneje todo lo relacionado con mySQLi
    $con = new mysqli();

    try {
        // Iniciamos la conexion
        $con -> connect(IP, USER, PASS);

        // Verificar que la conexión se realiza correctamente
        if ($con -> connect_error) {
            echo "Error en la conexión con la Base de Datos: " . $con -> connect_error;
            exit;
        }


        // Cerrar la conexion
        $con -> close();


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

        mysqli_close($con);
    }


// Función para consultar los datos de la base de datos
    function consultarBD($con) {

        // Creamos la sentencia
        $sql = "select * from videojuegos";

        // Ejecutamos la sentencia
        $result = $con -> query($sql);

        return $result;
    }


// Función para actualizar los datos de la base de datos    
    function actualizarBD($con, $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento) {
        
        // Creamos la sentencia
        $sql = "update videojuegos set nombre='$nombre', compañia='$compañia', stock=$stock, precio=$precio, fecha_Lanzamiento='$fecha_Lanzamiento'  where id = '$id'";

        // Ejecutamos la sentencia
        $result = $con -> query($sql);
    
        return $result;
    }



// Función para insertar datos en la base de datos
    function insertarBD($con, $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento){

        // Consultas preparadas
        $sql = "insert into videojuegos (id,nombre,compañia,stock,precio,fecha_Lanzamiento) values ('$id','$nombre','$compañia','$stock','$precio','$fecha_Lanzamiento')";

        // Ejecutamos la sentencia
        $result = $con -> query($sql);
    
        return $result;
    }



// Función para borrar datos de la base de datos
    function borrarBD($con, $id) {

         // Creamos la sentencia
         $sql = "delete from videojuegos where id='$id'";

        // Ejecutamos la sentencia
        $result = $con -> query($sql);
         
        return $result;
    }


    function crearScript($con) {
        
    }
?>