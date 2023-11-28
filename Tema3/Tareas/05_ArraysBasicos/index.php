<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 05 - Arrays Básicos</title>

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

            p {
                /* margin-left: 190px; */
                text-align: center;
            }

            #divImagen {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            table {
                margin: auto;
            }

            td {
                padding: 16px;
                text-align: center;
                border: black 1px solid;
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

                    <h3 style="text-align: center">Ejercicios de la Tarea 05</h3>

                    <h6>1. Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya elementos repetidos
                            <br><br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];</h6>
                        <p>
                            <?php
                                $datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

                                $datosNoRepetidos = array_unique($datos);
                                sort($datosNoRepetidos);

                                $datosOrdenados = new ArrayObject($datosNoRepetidos);

                                echo "datosOrdenados = [";

                                foreach ($datosOrdenados as $key => $value) {

                                    if ($key < count($datosOrdenados) - 1) {
                                        echo $value . ", ";
                                    
                                    } else {
                                        echo $value;
                                    }
                                }

                                echo "]";
                            ?>
                        </p>   
            
                    <h6>2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y cambie el valor por el número de la posición
                            <br><br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
                    </h6>
                        <p>
                            <?php
                                $datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

                                echo "datosModificados = [";

                                foreach ($datos as $key => $value) {
                                
                                    if ($key < count($datos) - 1) {
                                        
                                        if ($value == 3) {
                                            $value = $key;
                                            echo $value . ', ';
                                        
                                        } else {
                                            echo $value . ', ';
                                        }
                                    
                                    } else {
                                        if ($value == 3) {
                                            $value = $key;
                                            echo $value;
                                        
                                        } else {
                                            echo $value;
                                        }
                                    }

                                }

                                echo "]";
                            ?>
                        </p>

                    <h6>3. Escribe un programa que pida por url el tamaño de una matriz (Ej lado=4). Rellene de la siguiente manera:</h6>
                        <div id="divImagen"><img src="./imagenes/Tarea05_Ejercicio3.png" alt="Tarea05_Ejercicio3.png"></div>
                        <br>                       
                        <p>
                            Resultado:
                            <br>
                            <table border = "1">
                                <?php

                                    // Obtener el tamaño de la matriz desde la URL
                                    $tamanoMatriz = $_GET['lado'];

                                    for ($i = 0; $i < $tamanoMatriz; $i++) {

                                        echo "<tr>";

                                        for ($j = 0; $j < $tamanoMatriz; $j++) {

                                            if ($i == 0 || $j == 0) {
                                                echo "<td>1</td>";

                                            } else {
                                                // Calcular el valor según el patrón dado
                                                $valor = calcularValor($i, $j);
                                                echo "<td>$valor</td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }

                                    function calcularValor($fila, $columna) {

                                        // Utilizar la fórmula del triángulo de Pascal para calcular el valor
                                        $resultado = 1;
                                    
                                        for ($j = 1; $j <= $columna; $j++) {
                                            $resultado = ($fila + $columna);
                                        }
                                    
                                        return $resultado;
                                    }
                                ?>
                            </table>
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

