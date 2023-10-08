<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 03 - Ejercicio 1</title>

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

            h7 {
                font-weight: bold;
                margin-top: 30px;
                margin-left: 120px;
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
                            <a class="nav-link navTema" href="./ejercicio2.php">Ejercicio 2</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio3.php">Ejercicio 3</a>
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
                
                    <h5>1. Crea una página que:</h5>

                        <br>

                        <h7>a. Muestra el nombre del fichero que se está ejecutando.</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    echo basename(__FILE__);
                                    echo "<br><br><br>";
                                ?>
                            </p>


                        <h7>b. Muestra la dirección IP del equipo desde el que estás accediendo.</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    echo $_SERVER["SERVER_ADDR"];
                                    echo "<br><br><br>";
                                ?>
                            </p>

                        <h7>c. Muestra el path donde se encuentra el fichero que se está ejecutando.</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    echo $_SERVER["SERVER_ADDR"] .  __FILE__;
                                    echo "<br><br><br>";
                                ?>
                            </p>

                        <h7>d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18.</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    echo date("Y/m/d H:m:s", time());
                                    echo "<br><br><br>";
                                ?>  
                            </p>
  
                        <h7>e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de mes de año, hh:mm:ss , Zona horaria).</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    date_default_timezone_set("Europe/Lisbon");
                                    echo date("d/m/Y H:m:s", time()) . " " . date_default_timezone_get();
                                    echo "<br><br><br>";
                                ?>  
                            </p>

                        <h7>f. Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy de tu cumpleaños</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    $cumple = new DateTime("1998-04-30");
                                    echo $cumple -> format('U = d/m/Y');
                                    echo "<br><br><br>";
                                ?>  
                            </p> 

                        <h7>g. Calcular la fecha y el día de la semana de dentro de 60 días.</h7>
                            <p>
                                <?php
                                    echo "<br>";
                                    date_default_timezone_set("Europe/Madrid");
                                    echo date("d/m/Y l", strtotime("now + 60 day")) . " " . date_default_timezone_get();
                                    echo "<br><br><br>";
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