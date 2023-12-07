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



    function consultarBD($con) {

        // Creamos la sentencia
        $sql = "select * from videojuegos";

        // Ejecutamos la sentencia
        $result = $con -> query($sql);
    }


    function actualizarBD($con, $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento) {
        
        // Creamos la sentencia
        $sql = 'update alumnos set edad = ?, nombre = ?  where id = ?';

        // Iniciamos la conexión
        $stmt = $con -> stmt_init();

        // Preparamos la consulta
        $stmt -> prepare($sql);


        $id = '';
        $nombre = '';
        $compañia = '';
        $stock = 0;
        $precio = 0;
        $fecha_Lanzamiento = '';

        // Establecemos los parametros. 'sssid' -> String, String, String, Entero, Double, String(Aunque sea fecha)  
        $stmt -> bind_param('sssids', $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento);

        // Ejecutar la consulta
        $stmt -> execute();
    }


    function insertarBD($con, $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento){

        // Consultas preparadas
        $sql = "insert into videojuegos (id,nombre,compañia,stock,precio,fecha_Lanzamiento) values (?,?,?,?,?,?)";

        // Iniciamos la conexión
        $stmt = $con -> stmt_init();

        // Preparamos la consulta
        $stmt -> prepare($sql);

         // Introducimos los parametros en el statement
         $stmt -> bind_param('sssids', $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento);
 
         // Ejecutamos el statement
         $stmt -> execute();
    }


    function borrarBD($con, $id) {

         // Creamos la sentencia
         $sql = 'delete from videojuegos where id = ' . $id . '';

        // Ejecutamos la sentencia
        $result = $con -> query($sql);
         
         // Muestra el número de los registros eliminados
         echo mysqli_affected_rows($con);
    }

?>