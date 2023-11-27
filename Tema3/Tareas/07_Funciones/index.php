<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 07 - Funciones</title>

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

            h1 {
                text-align: center;
            }

            p {
                text-align: center;
            }

            pre {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("./Ejercicios/ejercicio1.php");
                include("./Ejercicios/ejercicio2.php");

                include("../../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-4 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 3</a>
                        </li>
                        </div>

                        <div class="col-md-4 col-lg">
                        <li class="nav-item">
                        <a class="nav-link navTema" href="http://<?php echo $_SERVER['SERVER_ADDR']; ?>/verCodigo.php?fichero=<?php echo dirname($_SERVER['SCRIPT_FILENAME']) . '/Ejercicios/ejercicio1.php'; ?>" target="_blank">Ejercicio 1</a>
                        </li>
                        </div>

                        <div class="col-md-4 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="http://<?php echo $_SERVER['SERVER_ADDR']; ?>/verCodigo.php?fichero=<?php echo dirname($_SERVER['SCRIPT_FILENAME']) . '/Ejercicios/ejercicio2.php'; ?>" target="_blank">Ejercicio 2</a>

                        </li>                      
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Enunciados de los ejercicios de la Tarea 07</h3>

                    <h6>1. Crea tu propio fichero de php que tenga las funciones de:</h6>

                        <p>
                            a. br() Pinta un br.
                                <?php
                                    br();
                                    br();
                                ?>
                        </p>

                        <p>
                            b. h1(cadena) Pinta la cadena entre dos h1.
                                <?php
                                    h1("Hola Mundo");
                                ?>
                        </p>

                        <p>
                            c. p(cadena) Pinta la cadena entre etiqueta p.
                                <?php
                                    p("Hola Mundo");
                                ?> 
                        </p>

                        <p>
                            d. self() Devuelve el fichero actual.
                            <br>
                                <?php
                                    self();
                                ?>
                        </p>

                        <p>
                            e. letraDni() Se introduce el dni y devuelve la letra que le corresponde. 
                            <br>
                                <?php
                                    letraDni(71035494);
                                ?> 
                        </p>


                    <h6>2. Haz una función que genere números aleatorios que se le pase como parámetros:</h6>
                        <p>
                            a. Array para que lo rellene con los números.
                        </p>
                            
                        <p>
                            b. Número mínimo incluido.
                        </p>

                        <p>
                            c. Número máximo incluido.
                        </p>

                        <p>
                            d. Número de números generados.
                        </p>

                        <p>
                            e. True si pueden repetirse/ False si no pueden repetirse.
                        </p>
                        
                        <p>
                            <pre>
                                <?php
                                    // Ejemplo de uso:
                                    $misNumeros = [];

                                    if (numAleatorios($misNumeros, 1, 10, 10, false)) {
                                        print_r($misNumeros);
                                    } 
                                ?>
                            </pre>
                        </p>
                </div>
            </main>

            <?php
                // Ver Código del fichero actual
                echo "<center><a href='http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'] . "' target='_blank'>Ver Código PHP</a></center>";

                echo "<br>";

                include("../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>