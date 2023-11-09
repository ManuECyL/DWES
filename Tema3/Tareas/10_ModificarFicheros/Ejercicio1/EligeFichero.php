<?php
    include("./Validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 10 - 1 - EligeFichero.php</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
            .error {
                color: red;
            }

            h3 {
                margin-top: 30px;
            }

            p {
                margin-left: 70px;
            }

            form {
                text-align:center;
                margin: 40px;
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

                    <h3 style="text-align: center">Elige Fichero</h3>

                    
                    <form action="./EligeFichero.php" method="post" name="formularioT10" enctype="multipart/form-data">

                        <label for="idFichero">Fichero: </label>
                            
                        <input type="text" name="fichero" id="idFichero">

                        <?php

                            if (!textVacio('fichero') && existe('editar')) {
                                
                                header('Location: ./EditaFichero.php?fichero='. $_REQUEST['fichero']);
                                exit;

                            } elseif (!textVacio('fichero') && existe('leer') && existeFichero('fichero')) {

                                if (existeFichero('fichero')) {
                                    header('Location: ./LeeFichero.php?fichero='. $_REQUEST['fichero']);
                                    exit;
                                }

                            } else if (textVacio('fichero') && (existe('leer') || existe('editar'))) {
                                ?>
                                    <span class="error">Debe escribir el nombre de un fichero</span>
                                <?php
                            
                            } elseif (!textVacio('fichero') && !existeFichero('fichero') && existe('leer')) {
                                ?>
                                    <span class="error">El fichero no existe</span>
                                <?php
                            
                            } 
                        ?>

                        <br><br>

                        <input type="submit" value="Leer" name="leer">
                        <input type="submit" value="Editar" name="editar">

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