<?php
    include("./validarPelicula.php");
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

                    <h1>FORMULARIO REGISTRO PELICULAS</h1>

                    <br>

                    <?php
                        $errores = array();

                        // Si ha ido todo bien
                        if (enviado() && validaFormulario($errores)) {
                            // mostrarResultado();
                            if(almacenarInformacion('peliculas.xml')) {
                                subirFichero('peliculas.xml');
                            }

                            
                        // Si hay algún error
                        } else {
                    ?>

                            <form action="" method="post" name="formularioPeliculas" enctype="multipart/form-data">

                            <!-- ID PELÍCULA -->
                                <label for="idPelicula">Id: <input type="text" name="idPelicula" id="idPelicula" placeholder="idPelicula" value="<?php recuerda('idPelicula')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'idPelicula');
                                    ?>
                                </span>

                                <br><br>

                            <!-- TÍTULO -->
                                <label for="titulo">Título: <input type="text" name="titulo" id="titulo" placeholder="Título" value="<?php recuerda('titulo')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'titulo');
                                    ?>
                                </span>

                                <br><br>

                            <!-- DIRECTOR -->
                                <label for="director">Director: <input type="text" name="director" id="director" placeholder="Director" value="<?php recuerda('director')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'director');
                                    ?>
                                </span>

                                <br><br>


                                <!-- AÑO LANZAMIENTO -->
                                <label for="añoLanzamiento">Año de Lanzamiento: <input type="text" name="añoLanzamiento" id="añoLanzamiento" placeholder="2023" value="<?php recuerda('añoLanzamiento')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'añoLanzamiento');
                                    ?>
                                </span>

                                <br><br>
                    
                            <!-- GÉNERO -->
                                <label for="genero">Género:</label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'genero');
                                    ?>
                                </span>

                                <br>

                                <?php
                                    generarRadios();
                                ?>

                                <br><br>

                            <!-- DURACIÓN -->
                                <label for="duracion">Duración: <input type="text" name="duracion" id="duracion" placeholder="Duración hh:mm:ss" value="<?php recuerda('duracion')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'duracion');
                                    ?>
                                </span>

                                <br><br>        
                                
                            <!-- ACTORES PRINCIPALES -->
                                <label for="actoresPrin">Actores Principales: <input type="text" name="actoresPrin" id="actoresPrin" placeholder="Actor,actor,actor..." value="<?php recuerda('actoresPrin')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'actoresPrin');
                                    ?>
                                </span>

                                <br><br>       

                            <!-- SINOPSIS -->
                                <label for="sinopsis">Sinopsis: <input type="text" name="sinopsis" id="sinopsis" placeholder="Texto" width="100" value="<?php recuerda('sinopsis')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'sinopsis');
                                    ?>
                                </span>

                                <br><br>       

                                <!-- Enviar o borrar la información mediante un botón-->
                                <input type="submit" value="Enviar" name="enviar" id="enviar">
                                <input type="reset" value="Borrar" name="borrar">

                                <br><br><br> 
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