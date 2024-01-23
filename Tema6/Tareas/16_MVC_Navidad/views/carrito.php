<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');
    require('./funciones/logout.php');


    if (isset($_SESSION['usuario'])) {

        if (existe('perfil')) {
            header('Location: ./perfil.php');
            exit;
    
        } elseif (existe('pedidos')) {
            header('Location: ./pedidos.php');
            exit;
            
        }elseif (existe('eliminar')) {
            $cod_Prod = $_POST['cod_Prod'];
            eliminarProductoCarrito($cod_Prod);

        } elseif (existe('actualizarCantidad')) {
            actualizarCantidadCarrito();

        } elseif (existe('vaciar')) {
            vaciarCarrito();            

        } elseif (existe('realizarPedido')){
            realizarPedido();           
        
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

                    <?php

                        $consulta = consultarCarrito($_SESSION['usuario']['id_Usuario']);

                        echo "<form method='post' action='./carrito.php' enctype='multipart/form-data'>";
    
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
    
                                    $total = 0;

                                    // Mostrar los datos de la tabla
                                    while ($fila = $consulta -> fetch_assoc()) {

                                        $cod_Prod = $fila['cod_Prod'];
                                        $total += $fila['precio'] * $fila['cantidad'];
                                        
                                        echo "<tr>";
        
                                            foreach ($fila as $indice => $campo) {
            
                                                switch ($indice) {
                                                    
                                                    case 'cod_Prod':                            
                                                        echo "<td>";
                                                            echo "<input type='text' id='cod_ProdGest' name='cod_Prods[]' value='". $campo."' readonly>";
                                                        echo "</td>";
                                                        break;
                                                    
                                                    case 'cantidad':
                                                        echo "<td>";
                                                            echo "<input type='number' class='inputCantidad' name='cantidades[]' value='". $campo."' min='1' max='100'>";
                                                        echo "</td>";
                                                        break;

                                                    case 'total':
                                                        echo "<td>" . $campo . "€</td>";
                                                        break;
   
                                                    case 'precio':
                                                        echo "<td>" . $campo . "€</td>";
                                                        break;

                                                    default:
                                                        echo "<td>" . $campo . "</td>";
                                                        break;
                                                }
                                            }
        
                                            echo "<td>";

                                                echo "<form method='post'>";

                                                    echo "<input type='hidden' name='cod_Prod' value='" . $cod_Prod . "'>";                                                    

                                                    echo "<button type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'>
                                                        <i class='bi bi-trash'></i>
                                                    </button>";

                                                echo "</form>";

                                            echo "</td>";
    
                                        echo "</tr>";
                                    }

                                echo "</table>";

                                echo "<br>";

                                echo "<h5>Total: " . $total . "€</h5>";

                                echo "<input type='submit' value='Actualizar Cantidad' name='actualizarCantidad' class='inputCarrito'>";

                                echo "<input type='submit' value='Vaciar Carrito' name='vaciar' class='inputCarrito'>";

                            } else {
                                echo "No se encontraron resultados en la base de datos";
                            }  
                                
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
            include_once("./html/footer.php");
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>