<?php

    if (isset($_SESSION['usuario'])) {

        // if (existe('perfil')) {
        //     header('Location: ./perfil.php');
        //     exit;
    
        // } elseif (existe('pedidos')) {
        //     header('Location: ./pedidos.php');
        //     exit;
            
        // }elseif (existe('eliminar')) {
        //     $cod_Prod = $_POST['cod_Prod'];
        //     eliminarProductoCarrito($cod_Prod);

        // } elseif (existe('actualizarCantidad')) {
        //     actualizarCantidadCarrito();

        // } elseif (existe('vaciar')) {
        //     vaciarCarrito();            

        // } elseif (existe('realizarPedido')){
        //     realizarPedido();           
        
        // } elseif (existe('cerrarSesion')) {
        //     cerrarSesion();
        // }
    }

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Carrito</title>

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
            require_once HTML . 'header.php';
        ?>
          
    <!-- NAV -->
        <?php
            require_once HTML . 'nav.php';
        ?>
    
    <!-- MAIN -->
        <main>

            <div class="container mt-4 text-center">

                <h3>Carrito</h3>

                <br>

                    <?php

                        $consulta = CarritoDAO::consultarCarrito($usuario -> id_Usuario);

                        echo "<form method='post' action='./carrito.php' enctype='multipart/form-data'>";
    
                            echo "<table>";

                                if ($consulta !== null) {
                                    // La consulta devolvió un resultado, puedes acceder a las propiedades del carrito
                                    $campos = get_object_vars($consulta);
                                
                                    echo "<tr>";

                                    foreach ($campos as $nombre => $valor) {
                                        echo "<th>" . $nombre . "</th>";
                                    }

                                    echo "</tr>";
                                
                                    echo "<tr>";

                                    foreach ($campos as $nombre => $valor) {
                                        echo "<td>" . $valor . "</td>";
                                    }
                                    echo "</tr>";

                                } else {
                                    // La consulta no devolvió ningún resultado
                                    echo "<tr>";
                                    echo "<td colspan='3'>No se encontraron resultados en la base de datos</td>";
                                    echo "</tr>";
                                }
                            
                            echo "</table>";

                                echo "<br>";

                                echo "<h5>Total: " . $total . "€</h5>";

                                echo "<input type='submit' value='Actualizar Cantidad' name='actualizarCantidad' class='inputCarrito'>";

                                echo "<input type='submit' value='Vaciar Carrito' name='vaciar' class='inputCarrito'>";
                                
                        echo "</form>";
                    ?>
                       
                        <br><br>

                        <form action="./carrito.php" method="post" enctype="multipart/form-data" >
                            <button type="submit" id="realizarPedido" name="realizarPedido" class="btn bg-primary bg-gradient formu">Realizar Pedido</button>
                        </form>         
            </div>
            
            <br>
            
        </main>

        <!-- FOOTER -->
        <?php
            require_once HTML . 'footer.php';
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>