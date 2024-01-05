<?php
    require('./funciones/confBD.php');

// Función que comprueba si la base de datos existe
    function comprobarBD() {

        // Establecemos la conexion
        $con = new mysqli();

        try {
            // Iniciamos la conexion
            $con = mysqli_connect(IP, USER, PASS);

            // Consulta para obtener la lista de bases de datos
            $consultaBD = $con -> query('show databases');

            // Comprobar si la base de datos existe
            while ($array = $consultaBD -> fetch_assoc()) {

                if ($array['Database'] == BD) {
                    return true;
                }
            }

            return false;

        } catch (\Throwable $th) {
            erroresBD($th);
            
        
        } finally {
            // Cerramos la conexion
            mysqli_close($con);
        }
    }


// Función para generar un script de creación para la Base de Datos
    function crearScript() {

        // Establecemos la conexion
        $con = new mysqli();

        try {   
            // Iniciamos la conexion
            $con = mysqli_connect(IP, USER, PASS);

            // Obtenemos el contenido del fichero sql
            $script = file_get_contents('./gameshop.sql');

            // Lee el contenido del script
            $con -> multi_query($script);

            // Comprobamos si hay un error de sintaxis y nos lo muestra
            do {
                $con -> store_result();

                if (!$con -> next_result()) {
                    break;
                }

            } while(true);

            // if (true) {
            //     echo "<p style='text-align:center;color:green'>Base de datos creada con éxito";
            // }
            
        } catch (\Throwable $th) {
            // Si hay un error, borra la BBDD
            $sql = "drop database " . BD;
            $con -> query($sql);

            erroresBD($th);

        } finally {
            // Cerramos la conexion
            mysqli_close($con);
        }
    }



// Función para comprobar si el usuario existe y es correcto
    function validaUsuario($user, $pass) {

        try {

            // Contiene la información necesaria para conectarse a la base de datos
            $con = mysqli_connect(IP, USER, PASS, BD);
        
            // Consulta a la BBDD
            $sql = 'select * from Usuarios where id_Usuario = ? and contraseña = ?';

            $stmt = mysqli_prepare($con, $sql);

            // Desencriptamos la contraseña
            $pass = sha1($pass); 

            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);

            // Ejecutamos la consulta preparada
            mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);

            // Lo guardamos en un array asociativo para trabajar posteriormente con él
            $usuario = mysqli_fetch_assoc($resultado);
            
        
            if ($usuario) {
                return $usuario;
            }
            
            return false;

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }


// Función para comprobar a que páginas tiene acceso el usuario
    function misPaginas() {

        try {

            // Contiene la información necesaria para conectarse a la base de datos
            $con = mysqli_connect(IP, USER, PASS, BD);
        
            // Consulta a la BBDD
            $sql = 'select url from paginas where codigo in (select codigoPagina from accede where codigoPerfil = ?)'; // Mejor hacer un JOIN

            // Preparamos la consulta
            $stmt = mysqli_prepare($con, $sql);

            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, 's', $_SESSION['usuario']['perfil']);

            // Ejecutamos la consulta preparada
            mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);

            $paginas = array();

            // Lo guardamos en un array asociativo y lo recorremos
            while ($pagina = mysqli_fetch_assoc($resultado)) {
                array_push($paginas, $pagina['url']);
            }

            // Comprueba si tiene contenido, sino, devuelve false
            if (count($paginas) > 0) {
                $_SESSION['usuario']['paginas'] = $paginas;
                return $paginas;   

            } else {
                return false;
            }

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }

// Función para consultar los datos de la base de datos
    function consultar($tabla) {

        try {

            $con = mysqli_connect(IP, USER, PASS, BD);

            // Creamos la sentencia
            $sql = "select * from $tabla";
    
            // Ejecutamos la sentencia
            $result = mysqli_query($con, $sql);
    
            return $result;

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            // Cerramos la conexion
            mysqli_close($con);
        }
    }


// Función para consultar los datos de la base de datos por id
    function consultarId($tabla, $idSQL, $id) {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Creamos la sentencia
            $sql = "select * from $tabla where $idSQL = ?";
            
            $stmt = mysqli_prepare($con, $sql);
                
            mysqli_stmt_bind_param($stmt, "s", $id);

            mysqli_stmt_execute($stmt);
    
            $result = mysqli_stmt_get_result($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            // Cerramos el statement y la conexion
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

        return $result;
    }


// Función para actualizar los datos de la base de datos    
    function actualizar($id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento) {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, BD);
        
            // Creamos la sentencia
            $sql = "update videojuegos set nombre = ?, compañia = ?, stock = ?, precio = ?, fecha_Lanzamiento = ? where id = ?";
    
            $stmt = mysqli_prepare($con, $sql);
    
            mysqli_stmt_bind_param($stmt, "ssidss", $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento, $id);
            
            mysqli_stmt_execute($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            // Cerramos el statement y la conexion
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para insertar datos en la base de datos
    function insertarUsuario(){

        try {

            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultas preparadas
            $sql = "insert into Usuarios (id_Usuario, contraseña, email, fecha_Nacimiento, rol) values (?,?,?,?,'cliente')";

            $fechaOriginal = $_REQUEST["fecha_Nacimiento"];
            $fechaFormateada = date("Y-m-d", strtotime($fechaOriginal));
    
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $_REQUEST["id_Usuario"], sha1($_REQUEST["contraseña"]), $_REQUEST["email"], $fechaFormateada);
            mysqli_stmt_execute($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            // Cerramos el statement y la conexion
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }

// Función para insertar datos en la base de datos
    function insertarProducto(){

        try {

            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultas preparadas
            $sql = "insert into Usuarios (id_Usuario, contraseña, email, fecha_Nacimiento) values (?,?,?,?)";

            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $_REQUEST["id_Usuario"], $_REQUEST["contraseña"], $_REQUEST["email"], $_REQUEST["fecha_Nacimiento"]);
            mysqli_stmt_execute($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            // Cerramos el statement y la conexion
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }



// Función para borrar datos de la base de datos
    function borrar() {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Creamos la sentencia
            $sql = "delete from videojuegos where id = ?";
   
           $stmt = $con -> stmt_init();
           $stmt -> prepare($sql);
           $stmt -> bind_param("s", $_REQUEST["id"]);
           $stmt -> execute();

        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            // Cerramos el statement y la conexion
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }

    
// Función para mostrar los errores que pueden generarse en la base de datos
    function erroresBD($th) {

        switch ($th -> getCode()) {

            case 1062:
                $mensaje = "Ha introducido el mismo id";
                break;

            case 1136:
                $mensaje = "El número de campos introducido no coincide";
                break;

            case 0:
                $mensaje = "No encuentra todos los parámetros de la secuencia";
                break;

            case 2002:
                $mensaje = "La IP de acceso a la BD es incorrecta";
                break;

            case 1045:
                $mensaje = "Usuario o contraseña incorrectos";
                break;

            case 1049:
                $mensaje = "Error al conectarse a la base de datos indicada";
                break;

            case 1146:
                $mensaje = "Error al encontrar la tabla indicada";
                break;

            case 1064:
                $mensaje = "Error de sintaxis en la Base de Datos";
                break;

            case 2031:
                $mensaje = "Algunos parametros no se han pasado a la funcion";
                break;
            
            default:
            $mensaje = "Error en la base de datos";
                break;
        }

        echo "<div class='alert alert-danger'><b>Error: " . $th->getCode() . " -> " . $mensaje . "</b> (" . $th->getMessage() . ") </div>";
    }
?>