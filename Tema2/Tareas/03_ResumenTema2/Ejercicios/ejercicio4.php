<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 03 - Ejecicio 4</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
            body {
                text-align: center;
            }

            img {
                height: 200px;
                width: 350px;
                margin: 10px;
                border: 1px solid black;
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
                            <a class="nav-link navTema" href="./ejercicio2.php?variable=">Ejercicio 2</a>
                        </li>                      
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio3.php?fecha=03/10/2023">Ejercicio 3</a>
                        </li>                    
                        </div>              
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h5>4. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años.</h5>

                    <br>

                    <p>
                        <?php
                            $date1 = new DateTime($_GET["fecha1"]);
                            $date2 = new DateTime($_GET["fecha2"]);

                            echo "<strong>Fecha Cumpleaños 1:</strong> " . date_format($date1, 'd-m-Y');
                            echo "<br>";
                            echo "<strong>Fecha Cumpleaños 2:</strong> " . date_format($date2, 'd-m-Y');
                            echo "<br>";

                            if ($date1 > $date2) {
                                $diff = $date1 -> diff($date2);
                                echo "<br>";
                                echo "Hay " . $diff -> y . " años de diferencia";
                                
                            }elseif ($date1 < $date2) {
                                $diff = $date2 -> diff($date1);
                                echo "<br>";
                                echo "Hay " . $diff -> y . " años de diferencia";

                            
                            } else {
                                echo "<br>";
                                echo "Tienen los mismos años";
                            }
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