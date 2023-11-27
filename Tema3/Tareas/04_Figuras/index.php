<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 04 - Figuras (Operadores y Bucles)</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">

        <style>
            h6 {
                font-weight: bold;
                margin-top: 30px;
                margin-left: 50px;
            }

            .figuras {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("../../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 3</a>
                        </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Ejercicios de la Tarea 04</h3>

                    <h6>1. Realiza un programa utilizando bucles que muestre una pirámide, teniendo en cuenta el numero de filas que pase el usuario por la URL.</h6>
                        <p>
                            <div class="figuras">
                                <?php
                                    // Obtener el número de filas desde la URL
                                    $filas = $_GET["filas"];

                                    // Imprimir la pirámide
                                    echo 'Pirámide con ' . $filas . ' filas';
                                    echo '<br>';

                                    for ($i = 1; $i <= $filas; $i++) {

                                        // Imprimir espacios en blanco para alinear a la derecha
                                        for ($j = 1; $j <= $filas - $i; $j++) {
                                            echo '&nbsp;';
                                        }
                                    
                                        // Imprimir asteriscos para formar la pirámide
                                        for ($j = 1; $j <= 2 * $i - 1; $j++) {
                                            echo '*';
                                        }
                                    
                                        echo '<br>';
                                    }
                                ?>
                            </div>
                        </p>   
            
                    <h6>2. Realiza un programa utilizando bucles que muestre un rombo, teniendo en cuenta el número de filas que pase el usuario por la URL.</h6>
                        <p>
                            <div class="figuras">
                                <?php
                                    // Imprimir el rombo
                                    echo 'Rombo con ' . $filas . ' filas';
                                    echo '<br>';

                                    for ($i = 1; $i <= $filas; $i++) {

                                        for ($j = 1; $j <= $filas - $i; $j++) {
                                            echo '&nbsp;';
                                        }

                                        for ($j = 1; $j <= 2 * $i - 1; $j++) {
                                            echo '*';
                                        }

                                        echo '<br>';
                                    }
                                    
                                    for ($i = $filas - 1; $i >= 1; $i--) {

                                        for ($j = 1; $j <= $filas - $i; $j++) {
                                            echo '&nbsp;';
                                        }

                                        for ($j = 1; $j <= 2 * $i - 1; $j++) {
                                            echo '*';
                                        }

                                        echo '<br>';
                                    }
                                ?>
                            </div>
                        </p>

                    <h6>3. Realiza un programa utilizando bucles que muestre un rombo hueco, teniendo en cuenta el numero de filas que pase el usuario por la URL.</h6>
                        <p>
                            <div class="figuras">
                                <?php
                                    // Imprimir el rombo hueco
                                    echo 'Rombo Hueco con ' . $filas . ' filas';
                                    echo '<br>';

                                    for ($i = 1; $i <= $filas; $i++) {

                                        for ($j = 1; $j <= $filas - $i; $j++) {
                                            echo '&nbsp;&nbsp;';
                                        }

                                        for ($j = 1; $j <= 2 * $i - 1; $j++) {

                                            if ($j == 1 || $j == 2 * $i - 1 || $i == $filas ) {
                                                echo '*';

                                            } else {
                                                echo '&nbsp;&nbsp;';
                                            }
                                        }
                                        echo '<br>';
                                    }

                                    for ($i = $filas - 1; $i >= 1; $i--) {

                                        for ($j = 1; $j <= $filas - $i; $j++) {
                                            echo '&nbsp;&nbsp;';
                                        }

                                        for ($j = 1; $j <= 2 * $i - 1; $j++) {
                                            
                                            if ($j == 1 || $j == 2 * $i - 1 || $i == $filas) {
                                                echo '*';

                                            } else {
                                                echo '&nbsp;&nbsp;';
                                            }
                                        }
                                        echo '<br>';
                                    }
                                ?>
                            </div>
                        </p>

                    <h6>4. Realiza un programa que le introduzca un valor (pasado por la URL) de un producto con 2 decimales y posteriormente un valor con el que pagar por encima (Valor del producto 6.33€ y ha pagado con 10€). Muestra el número mínimo de monedas con las que puedes devolver el cambio.</h6>
                        <p>
                            <div class="figuras">
                                <?php
                                    // Obtener valores de la URL
                                    $precioProducto = $_GET['precio'];
                                    $pagado = $_GET['pagado'];

                                    // Calcular el cambio
                                    $cambio = $pagado - $precioProducto;

                                    // Definir los valores de las monedas
                                    $monedas = [2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01];

                                    // Inicializar el contador de monedas
                                    $contadorMonedas = 0;

                                    // Calcular el cambio en monedas
                                    foreach ($monedas as $valorMoneda) {
                                        // Calcular la cantidad de esta moneda en el cambio
                                        $cantidadMoneda = floor($cambio / $valorMoneda);

                                        // Actualizar el contador de monedas
                                        $contadorMonedas += $cantidadMoneda;

                                        // Actualizar el cambio
                                        $cambio -= $cantidadMoneda * $valorMoneda;
                                    }

                                    echo '<p>Precio del producto: ' . number_format($precioProducto, 2) . ' €</p>';
                                    echo '<p>Pagado: ' . number_format($pagado, 2) . ' €</p>';
                                    echo '<p>Cambio: ' . number_format($pagado - $precioProducto, 2) . ' €</p>';
                                    echo '<p>Número mínimo de monedas para el cambio: ' . $contadorMonedas . '</p>';
                                ?>
                            </div>
                        </p>
                            
                    <h6>5. Escriba un programa que se le pase un año por la URL y que escriba si es bisiesto o no.</h6>
                        <p>
                            <div class="figuras">
                                <?php
                                    // Obtener el año de la URL
                                    $anio = $_GET['anio'];

                                    // Verificar si es bisiesto
                                    if ((($anio % 4 == 0) && ($anio % 100 != 0)) || ($anio % 400 == 0)) {
                                        echo "El año $anio es bisiesto";

                                    } else {
                                        echo "El año $anio no es bisiesto";
                                    }
                                ?>
                            </div>

                        </p>
                </div>
            </main>

            <?php
                include("../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>

