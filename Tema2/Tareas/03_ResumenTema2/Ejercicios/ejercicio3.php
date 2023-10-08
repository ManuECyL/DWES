<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 03 - Ejecicio 3</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
            h5 {
                font-weight: bold;
                margin-top: 30px;
                margin-left: 50px;
            }

            p {
                margin-left: 190px;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("../../../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tarea 03</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio1.php">Ejercicio 1</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./Ejercicios/ejercicio2.php?variable=">Ejercicio 2</a>
                        </li>                      
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio4.php">Ejercicio 4</a>
                        </li>                    
                        </div>              

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio5.php">Ejercicio 5</a>
                        </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">
                    
                    <h5>3. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023)</h5>

                        <br>

                        <p>
                            <?php
                                $dia = new DateTime($_GET['fecha']);
                                echo $dia -> format('l');
                                echo "<br><br>";
                            ?>
                        </p>
                </div>
            </main>

            <?php
                include("../../../../html/footer.html");
            ?>

        </div>
    </body>
</html>