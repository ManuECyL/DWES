<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Apuntes Tema 2</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./index.php" id="anterior">Apuntes Tema 2</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px; text-align: center;">
                    <?php
                        echo time();

                        echo "<p>Zona que tiene el servidor</p>";
                        echo date_default_timezone_get();

                        date_default_timezone_set("Europe/Madrid");
                        echo "<br><br> Cambiada <br><br>";
                        echo date_default_timezone_get();

                        echo "<br><br>" . date("r");

                        echo "<br><br>" . date("r");
                        echo "<br><br>" . date("d/m/Y H:m:s");

                        echo "<p>String to fecha</p>";
                        $cumpleGiorgi = strtotime("08/21/1998");
                        echo $cumpleGiorgi;
                        echo "<p>" . date("d/m/y",$cumpleGiorgi) . "</p>";

                    // Fecha de hoy
                        $hoy = strtotime("now");
                        echo "<p>" . date("d/m/y",$hoy) . "</p>";

                    // Fecha de hoy + 60 días
                        $hoySesenta = strtotime("now + 60 day");
                        echo "<p>" . date("d/m/y",$hoySesenta) . "</p>";

                    // Diferencia entre fechas para calcular los años de alguien
                        $tiempoRestado = $hoy - $cumpleGiorgi;
                        $segundosAlAño = 60*60*24*365;
                        $años = $tiempoRestado/$segundosAlAño;
                        echo $años;

                    // Diferencia entre fechas con DateTime
                        $cumpleGiorgi = new Datetime('1998-08-21');
                        $hoy = new Datetime();
                        $intervalo = $cumpleGiorgi -> diff($hoy);
                        echo "<pre>";
                        print_r ($intervalo);
                        echo "</pre>";

                    // Otros métodos: mktime | getdate
                        echo "<pre>";
                        print_r (getdate());
                        echo "</pre>";


                    // Ver Código del fichero actual
                        echo "<a href='http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'] . "' target='_blank'>Ver Código PHP</a>";

                    ?>
                </div>
            </main>

            <?php
                include("../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>
