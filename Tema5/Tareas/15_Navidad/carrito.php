<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');
    require('./funciones/logout.php');

    if (isset($_SESSION['usuario'])) {

        if (existe('perfil')) {
            header('Location: ./perfil.php');
            exit;
    
        } elseif (existe('eliminar')) {

            // Eliminar el producto del carrito
            if (eliminarProductoCarrito()){
                echo "<div class='alert alert-success text-center'><b>Se ha eliminado el producto del carrito correctamente</b></div>";
            }


        } elseif (existe('actualizarCantidad')) {
            $cod_Prods = $_POST['cod_Prod'];
            $cantidades = $_POST['cantidad'];
    
            // Actualizar la cantidad de cada producto
            for ($i = 0; $i < count($cod_Prods); $i++) {
                actualizarCantidadCarrito($_SESSION['usuario']['id_Usuario'], $cod_Prods[$i], $cantidades[$i]);
            }

            
        } elseif (existe('vaciar')) {
            vaciarCarrito($_SESSION['usuario']['id_Usuario']);
            echo "<div class='alert alert-success text-center'><b>Se ha vaciado el carrito correctamente</b></div>";


        } elseif (existe('realizarPedido')){
            
        
        } elseif (existe('cerrarSesion')) {
            cerrarSesion();
        }
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
                include_once("./html/header.php");
                
            } else {
                include_once("./html/header.php");
            }
            
        ?>
          
    <!-- NAV -->
        <?php
            include_once("./html/nav.php");
        ?>
    
    <!-- MAIN -->
        <main>

            <div class="container mt-4 text-center">

                <h3>Carrito</h3>

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
    
                                // $i = 0;

                                $total = 0;

                                // Mostrar los datos de la tabla
                                while ($fila = $consulta -> fetch_assoc()) {
                                    
                                    $total = $fila['total'];
                                    
                                    echo "<tr>";
    
                                    
                                        foreach ($camposTabla as $columna) {

                                            if ($columna == 'cantidad') {
                                                echo "<td>";


                                                    echo "<input type='hidden' name='cod_Prod[]' value='" . $fila['cod_Prod'] . "'>";
                                                    echo "<input type='number' name='cantidad[]' value='" . $fila['cantidad'] . "'>";
                ?>                                                     
                                                    <!-- <input type="number" class="inputCantidad" name="inputCantidad" id="inputCantidad" value="<?php echo $fila[$columna]; ?>" min="1" max="100"> -->

                                                    <!-- Div que contiene las opciones para cambiar la cantidad de productos usando la función cambiarCantidad() en Javascript -->
                                                    <!-- <div class="divCantidad">
                                                        <button class="inputCantidad cambiarCantidad restarCantidad" id="restarCantidad" onclick="cambiarCantidad(event, -1, <?php echo $i; ?>)">-</button>
                                    
                                                        <input type="text" class="inputCantidad" id="inputCantidad<?php echo $i; ?>" readonly value="<?php echo $fila[$columna]; ?>">
                                    
                                                        <button class="inputCantidad cambiarCantidad sumarCantidad" id="sumarCantidad" onclick="cambiarCantidad(event, 1, <?php echo $i; ?>)">+</button>
                                                    </div> -->
                <?php
                                                echo "</td>";
                                            
                                            } elseif ($columna == 'total') {
                                                $total += $fila[$columna];
                                                echo "<td>" . $fila[$columna] . "</td>";
                                            
                                            } else {    
                                                echo "<td>" . $fila[$columna] . "</td>";
                                            }

                    ?>
                                    
                    <?php

                                        // $i++;
                                        }
        
                                        echo "<td>";
                    ?>
                                            <form method="post" action="./carrito.php">
                                                <input type="hidden" name="cod_Prod" value="<?php echo $fila['cod_Prod']?>">
                                                <input type="hidden" name="cantidad" value="<?php echo $fila['cantidad']?>">
                                                <!-- <input type="submit" value="Eliminar" name="eliminar"> -->
                                                <button type="submit" name="eliminar" value="<?php echo $fila['cod_Prod'] ?>" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                </button>
                                                
                                            </form>
                                                 
                    <?php
                                        echo "</td>";
    
                                    echo "</tr>";
                                }
                                
                            echo "</table>";

                        echo "<br>";

                    ?>
                       
                        <h5>Total: <?php echo $total; ?> €</h5>

                        <br>
                        
                        <input type="submit" value="Actualizar Cantidad" name="actualizarCantidad" class="inputCarrito">
                        <input type="submit" value="Vaciar Carrito" name="vaciar" class="inputCarrito">

                        <br><br>

                        <button type="submit" id="realizarPedido" name="realizarPedido" class="btn bg-primary bg-gradient formu">Realizar Pedido</button>

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
            function cambiarCantidad(event, cantidad, i) {
                
                // Evitamos que al pulsar los botones de añadir o quitar cantidad, se envíe el formulario y recargue la página
                event.preventDefault();

                let inputCantidad = document.getElementById('inputCantidad' + i);

        
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