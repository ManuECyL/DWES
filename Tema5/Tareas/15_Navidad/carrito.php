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
            header('Location: ./index.php');
            exit;

            switch(existe($pagina)) {
                case 'registrarse':
                    echo "<div class='alert alert-danger text-center'><b>Ya está registrado</b></div>";
                    break;

                case 'perfil':
                    header('Location: ./perfil.php');
                    exit;
                    break;

                case 'comprar':
                    añadirCarrito($_REQUEST['id_Usuario'] ,$_REQUEST['cod_Prod'], $_REQUEST['cantidad']);
                    break;

                case 'cerrarSesion':
                    cerrarSesion();
                    break;
            } 
        
        } else {
            echo "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
        }
    
    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    } 


    if (existe('registrarse')) {
        header('Location: ./registro.php');
        exit;

    }elseif (existe('comprar') && !isset($_SESSION['usuario'])) {
        echo "<div class='alert alert-danger text-center'><b>Debe iniciar sesión para comprar</b></div>";
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

        <style>
            table {
                margin: auto;
            }

            td {
                padding: 16px;
                text-align: center;
                border: gray 1px solid;
            }

            th {
                padding: 10px;
                text-align: center;
                border: gray 1px solid;
            }

            thead td {
                font-weight: bold;
            }
        </style>

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

            <div class="container mt-4 text-center">

                <h3>Carrito</h3>

                <div class="divCantidad">
                    <button aria-label="quitar" class="quitarCantidad" onclick="cambiarCantidad(-1)">-</button>

                    <input type="text" aria-label="inputCantidad" id="inputCantidad" value="1" readonly>

                    <button aria-label="añadir" class="añadirCantidad" onclick="cambiarCantidad(1)">+</button>
                </div>


                <br>

                <form action="./carrito.php" method="post" name="formularioCarrito" enctype="multipart/form-data" class="formularioCarrito text-center mx-auto">

                    <?php
                        $consulta = consultarCarrito($_SESSION['usuario']['id_Usuario']);
    
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

                            echo "<br>";

                        ?>
                            <form action="./carrito.php" method="post" name="formularioCarrito" enctype="multipart/form-data">
                                <input type="submit" value="Realizar Pedido" name="realizarPedido">
                            </form>    
                        <?php

                        } else {
                            echo "No se encontraron resultados en la base de datos";
                        }                    
                    ?>
                
                </form>
                
            </div>
            
            <br>
            
        </main>

        <!-- FOOTER -->
        <?php
            include_once("./html/footer.php");
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <script>

            // Función para cambiar la cantidad de productos que se van a comprar en el carrito
            function cambiarCantidad(cantidad) {

                let inputCantidad = document.getElementById('inputCantidad');
                let cantidadActual = parseInt(inputCantidad.value);

                // Comprobamos que la cantidad no sea menor que 1
                if (cantidadActual + cantidad > 0) {
                    // En esta línea, 'cantidadActual' es el valor actual del input y 'cantidad' es el valor que se va a sumar o restar. Si 'cantidad' es -1, entonces estás sumando -1 a 'cantidadActual', lo que es equivalente a restar 1 de 'cantidadActual'.
                    inputCantidad.value = cantidadActual + cantidad;
                }
            }

        </script>

    </body>
</html>