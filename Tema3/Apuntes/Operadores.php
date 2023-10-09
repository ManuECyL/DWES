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
                                <a class="nav-link navTema" href="./index.php" id="anterior">Apuntes Tema 3</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px; text-align: center;">

                    <?php
                    // Nave Espacial
                        echo 4 <=> 5;
                        echo "<br>";
                        echo 5 <=> 5;
                        echo "<br>";
                        echo 6 <=> 5;
                        echo "<br>";

                        echo 5 & 3;
                        echo "<br>";
                        echo 5 | 3;
                        echo "<br>";


                    // Sentencias condicionales
                        
                        // If
                        if (4 > 3) {
                            echo "Mayor" . "<br>";
                            echo "Mayor";

                        } elseif (3 < 4) {
                            echo "Menor";
                        
                        } else 
                            echo "Igual";

                        // Switch
                        // switch ($variable) {
                        //     case 'value':
                        //         # code...
                        //         break;
                            
                        //     default:
                        //         # code...
                        //         break;
                        // }

                        echo "<br>";

                    // Sentencias de bucle

                        // While
                        $a = 1;

                        while ($a <= 10) {
                            echo $a;
                            $a++;
                        }

                        echo "<br>";

                        // Do While
                        // do {
                        //     # code...
                        // } while ($a <= 10);


                        // For
                        for ($i=0; $i < 10; $i++) { 
                            echo $i;
                        }

                        echo "<br>";

                        // For each
                        // foreach ($_SERVER as $key => $value) {
                        //     echo "<br>Clave: " . $key . " Valor: " . $value;
                        // }
                        foreach ($_SERVER as $value) {
                            echo "<br>Valor: " . $value;
                        }

                        echo "<br><br>";

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