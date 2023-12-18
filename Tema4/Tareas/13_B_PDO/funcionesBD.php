<?php
// Función para consultar los datos de la base de datos
    function consultarBD($con, $tabla) {

        // Creamos la sentencia
        $sql = "select * from $tabla";

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


// Función para generar un script de creación para la Base de Datos
    function crearScript($con, $BD) {

        // Iniciamos la conexion
        $con -> connect(IP, USER, PASS);
        
        try {   
            // Obtenemos el contenido del fichero sql
            $script = file_get_contents($BD);
    
            // Lee el contenido del script
            $con -> multi_query($script);
                
            // Comprobamos si hay un error de sintaxis y nos lo muestra
            do {
                $con -> store_result();
    
                if (!$con -> next_result()) {
                    break;
                }
    
            } while(true);

            if (true) {
                echo "<p style='text-align:center;color:green'>Base de datos creada con éxito";
            }

            // Cerramos la conexion
            $con -> close();
            
        } catch (\Throwable $th) {

            // Si hay un error, borra la BBDD
            $sql = "drop database tienda";
            $con -> query($sql);
    
            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }
?>