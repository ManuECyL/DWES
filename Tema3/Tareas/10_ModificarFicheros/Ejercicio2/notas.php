<?php
    include("./validaciones.php");
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 10 - 2 - Notas.csv</title>

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

            table {
                margin: auto;
            }

            td {
                padding: 16px;
                text-align: center;
                border: gray 1px solid;
            }

            th {
                padding: 10px;
                text-align: center;
                border: gray 1px solid;
            }

            thead td {
                font-weight: bold;
            }

            #clase {
                background-color: lightblue;
            }

            #inputAñadir {
                display: flex;
                text-align: center;
                margin: auto;
                margin-bottom: 20px;
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

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tarea 10</a>
                            </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>

                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Notas.csv</h3>

                    <?php

                        if (file_exists("notas.csv") && existe("editar")) {
                                                        
                            header('Location: ./editar.php');
                            exit;
                        
                        } elseif (file_exists("notas.csv") && existe("añadir")) {
                            header('Location: ./añadir.php');
                            exit;
                        }
                    ?>

                    <table border="1">
                        <thead>
                            <?php
                                // echo "<th id='clase'>CLASE</th>";
    
                                $filaSuperior = array("ALUMNO", "NOTA 1", "NOTA 2", "NOTA 3", "EDITAR");
                            
                                // Valores fila superior
                                foreach ($filaSuperior as $clave => $value) {
                                    echo "<th>$value</th>";
                                }
                            ?>
                        </thead>
            
                        <tbody>
                            <?php

                                if (file_exists("notas.csv")) {
                                                            
                                    // Abrir fichero con opción de solo lectura 'r'
                                    if ($abrir = fopen("notas.csv", 'r')) {

                                        if (filesize("notas.csv") == 0) {
                                            echo "El fichero está vacío";
                                        
                                        } else {
                                            
                                            // Lee el fichero .csv
                                            while ($datos = fgetcsv($abrir, filesize("notas.csv"), ";")) {

                                                echo "<tr>";

                                                    // Rellenar las celdas
                                                    foreach ($datos as $fila) {
                                                        echo "<td>" . $fila . "</td>";  
                                                    }

                                                    echo "<td>";
                                                        ?>
                                                            <form action="./editar.php" method="post" name="formularioT10_2" enctype="multipart/form-data">
                                                                    <input type="hidden" name="alumno" value="<?= $datos[0] ?>">
                                                                    <input type="hidden" name="nota1" value="<?= $datos[1] ?>">
                                                                    <input type="hidden" name="nota2" value="<?= $datos[2] ?>">
                                                                    <input type="hidden" name="nota3" value="<?= $datos[3] ?>">
                                                                    
                                                                <input type="submit" value="Editar" name="editar">
                                                            </form>
                                                        <?php
                                                    echo "</td>";

                                                echo "</tr>";
                                            }
                            ?>
                        </tbody>
                    </table>

                            <?php                                       
                                        }
            
                                        fclose($abrir);
                                    }
                                
                                } else {
                            ?>
                                    <span class="error">El fichero no existe</span>
                            <?php
                                }
                            ?>

                    <br><br>

                    <form action="./notas.php" method="post" name="formularioT10_2" enctype="multipart/form-data">
                        <input type="submit" value="Añadir" name="añadir" id="inputAñadir">
                    </form>
                    
                </div>
            </main>

            <?php
                // Ver Código del fichero actual
                echo "<center><a href='http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'] . "' target='_blank'>Ver Código PHP</a></center>";

                echo "<br>";

                include("../../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>