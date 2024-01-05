<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');
    require('./funciones/logout.php');

    if (!comprobarBD()) {
        crearScript();
    }
    
    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
        
        $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);

        if ($usuario) {
            
            $_SESSION['usuario'] = $usuario;
            header('Location: ./homeUser.php');
            exit;
        
        } else {
            echo "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
        }
    
    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    } 


    if (existe('registrarse')) {
        header('Location: ./registro.php');
        exit;
    }

    if (existe('perfil')) {
        header('Location: ./perfil.php');
        exit;
    }

    if (cerrado()) {
        cerrarSesion();
    }
    
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Productos</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/estilos.css">

    </head>

    <body>

    <!-- HEADER -->
        <?php              
            if (isset($_SESSION['usuario'])) {
                include_once("./html/headerUser.php");
                
            } else {
                include_once("./html/headerInicio.php");
            }
            
        ?>
          
    <!-- NAV -->
        <?php
            include_once("./html/navInicio.php");
        ?>
    
    <!-- MAIN -->
        <main>
            <div class="container mt-5 text-center">

                <h3>Carrito</h3>

                <form action="./carrito.php" method="post" name="formularioCarrito" enctype="multipart/form-data" class="formularioCarrito mx-auto">

                    <?php
                        $consulta = consultar('videojuegos');
    
                        // Comprobamos si hay resultados
                        if ($consulta -> num_rows > 0) {
                            
                            // Obtenemos los nombres de los campos que contiene la tabla
                            $camposTabla = array();
    
                            while ($campo = $consulta -> fetch_field()) {
                                $camposTabla[] = $campo -> name;
                            }
    
                            echo "<table>";
    
                                echo "<tr>";
    
                                // Mostrar los campos en el encabezado de la tabla
                                foreach ($camposTabla as $columna) {
                                    echo "<th>" . $columna . "</th>";
                                }

                                    echo "<th> Eliminar </th>";
    
                                echo "</tr>";
    
                                // Mostrar los datos de la tabla
                                while ($fila = $consulta -> fetch_assoc()) {
                                    
                                    echo "<tr>";
    
                                        foreach ($camposTabla as $columna) {
                                            echo "<td>" . $fila[$columna] . "</td>";
                                        }
        
                                        echo "<td>";
                                            ?>
                                                <form action="./carrito.php" method="post" name="formularioCarrito" enctype="multipart/form-data">
                                                    <input type="submit" value="Eliminar" name="eliminar">
                                                </form>                                               
                                            <?
                                        echo "</td>";
    
                                    echo "</tr>";
                                }
    
                            echo "</table>";
    
                        } else {
                            echo "No se encontraron resultados en la base de datos";
                        }                    
                    ?>
                
                </form>
                

            </div>
            
            
        </main>

        <!-- FOOTER -->
        <?php
            include_once("./html/footer.php");
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>