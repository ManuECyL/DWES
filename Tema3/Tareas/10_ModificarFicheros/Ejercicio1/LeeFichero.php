<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 10 - Modificar Ficheros</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
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

                        <div class="col-md-4 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tarea 10</a>
                            </li>
                        </div>

                        <div class="col-md-4 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./EligeFichero.php?">Elige</a>
                            </li>                      
                        </div>

                        <div class="col-md-4 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./EditaFichero.php?">Editar</a>
                            </li>                      
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>

                <?php
                    // include("./Validaciones.php");

                    // if (existeBoton('Volver')) {
                    //     header('Location: ./EligeFichero.php');
                    //     exit;
                    // }

                    // if (existe('editar')) {
                    //     header('Location: ./EditaFichero.php?fichero='. $_REQUEST['fichero']);
                    //     exit();
                    // }
                ?>

                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Leer Fichero</h3>

                    <form action="" method="post" name="formularioT09" enctype="multipart/form-data">

                        <textarea name="leer" id="leer" cols="30" rows="10" readonly></textarea>

                        <br><br>

                        <input type="submit" value="Volver" name="volver">
                        <input type="submit" value="Modificar" name="modificar">

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