<?php
    include("./validarBuscarPelicula.php");
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Formulario de Registro</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <style>
            .error {
                color: red;
            }

            body{
                text-align: center;
            }

            p{
                font-weight: bold;
            }

            img {
                width: 150px;
                height: 100px;
            }

            #enviar {
                width: 200px;
            }
        </style>

        <link rel="stylesheet" href="../../../../css/estilos.css">
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
                                <a class="nav-link navTema" href="./index.php" id="anterior">Tarea 09</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px; text-align: center;">

                    <br>

                    <h1>BUSCADOR PELICULAS</h1>

                    <br>

                    <?php
                        $errores = array();

                        // Si ha ido todo bien
                        if (enviado() && validaFormulario($errores)) {
                            mostrarResultado();
                            
                        // Si hay algún error
                        } else {
                    ?>

                            <form action="" method="post" name="formularioBuscarPeliculas" enctype="multipart/form-data">


                                <label for="Buscar Película">
                                    <input type="text" name="buscarText" id="buscarText" placeholder="Escriba un Título o Actor">                                
                                </label>
                                
                                <input type="submit" value="Buscar Película" name="buscar" id="buscar">

                                <span class="error">
                                        <?php            
                                            errores($errores,'buscarText');
                                        ?>
                                </span>

                                <br><br>
                            </form>

                    <?php // Abrir php
                        } // Cerrar el else

                         // Ver Código del fichero actual
                            echo "<center><a href='http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'] . "' target='_blank'>Ver Código PHP</a></center>";

                            echo "<br>";
                    ?> <!-- Cerrar el php -->
                </div>
            </main>

            <?php
                include("../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>