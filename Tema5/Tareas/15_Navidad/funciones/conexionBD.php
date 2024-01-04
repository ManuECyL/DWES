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

            // echo $script;

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