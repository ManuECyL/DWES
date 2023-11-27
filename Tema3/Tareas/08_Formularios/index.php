<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 08 - Formulario</title>

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

                        <div class="col-md-6 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 3</a>
                        </li>
                        </div>

                        <div class="col-md-6 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./formulario.php?">Formulario</a>
                        </li>                      
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Tarea 08</h3>

                    <h6>1. Crea tu propio fichero de php que tenga las funciones de validación de formularios:</h6>

                        <p>
                            a) Todos los campos tienen que ser validados, por tu librería.
                        </p>

                        <p>
                            b) Si hay alguno de los campos del formulario que no están correctos, se muestra un mensaje en rojo, diciendo que está vacío.
                            <img src="./imagenes/Imagen_b.png" alt="Imagen_b">
                        </p>

                        <p>
                            c) Los elementos que estén bien tienen que mantenerse.
                        </p>

                        <p>
                            d) El Combo no puede elegirse la primera opción.
                        </p>

                        <p>
                            e) Los check deben generarse dinámicamente.
                        </p>
                            
                        <p>
                            f) El número obligatorio debe ser entre 0 y 100.
                        </p>

                        <p>
                            g) En la fecha obligatoria debe ser mayor de edad.
                        </p>

                        <p>
                            h) Validar el número mínimo (1) y máximo (3) de checks.
                        </p>

                        <p>
                            i) Subir una imagen
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