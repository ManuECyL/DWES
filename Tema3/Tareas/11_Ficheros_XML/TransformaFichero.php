<?php
    include("./validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 11 - Ficheros XML</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
            .error {
                color: red;
            }

            h3 {
                margin: 30px;
            }

            p {
                margin-left: 70px;
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
                                <a class="nav-link navTema" href="./index.php" id="anterior">Tarea 11</a>
                            </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>

                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Transforma Fichero</h3>

                    <?php
        
                        $notasCSV = "notas.csv";
                        $notasXML = "notas.xml";


                        if (file_exists("notas.csv")) {
                                
                            // Lee el contenido del archivo CSV
                            $contenidoCSV = file_get_contents($notasCSV);

                            // Divide el contenido del CSV por líneas
                            $lineas = explode("\n", $contenidoCSV);

                            // Crea un nuevo objeto SimpleXMLElement para el XML
                            $xml = new SimpleXMLElement('<notas></notas>');
                                                  
                            // Recorre cada línea del CSV
                            foreach ($lineas as $linea) {

                                // Divide cada línea por punto y coma
                                $datos = explode(';', $linea);

                                // Crea un elemento <alumno> para cada línea
                                $alumno = $xml->addChild('alumno');

                                // Añade un elemento <nombre> con el valor correspondiente
                                $alumno->addChild('nombre', $datos[0]);

                                // Añade elementos <nota1>, <nota2>, <nota3> con los valores correspondientes
                                $alumno->addChild('nota1', $datos[1]);
                                $alumno->addChild('nota2', $datos[2]);
                                $alumno->addChild('nota3', $datos[3]);
                            }

                            // Guarda el contenido del XML en el archivo de salida
                            $xml->asXML($notasXML);

                            echo 'Transformación completada';
                        
                        } else {
                    ?>
                            <span class="error">El fichero no existe</span>
                    <?php
                        }

                        header('Location: ./LeeFicheroXML.php');
                        exit;
                    ?>

                    <br><br>

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

