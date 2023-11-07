<?php
    include("./valida.php");
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

                    <h1>FORMULARIO DE REGISTRO</h1>

                    <br>

                    <?php
                        $errores = array();

                        // Si ha ido todo bien
                        if (enviado() && validaFormulario($errores)) {
                            subirFichero('fichero');
                            mostrarResultado();

                        // Si hay algún error
                        } else {
                    ?>

                            <form action="" method="post" name="formularioT09" enctype="multipart/form-data">

                                <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php recuerda('nombre')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'nombre');
                                    ?>
                                </span>

                                <br><br>

                                <label for="apellidos">Apellidos: <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php recuerda('apellidos')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'apellidos');
                                    ?>
                                </span>

                                <br><br>


                                <label for="contraseña">Contraseña: <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" value=<?php recuerda('contraseña')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'contraseña');
                                    ?>
                                </span>

                                <br><br>

                                <label for="r_contraseña">Repetir Contraseña: <input type="password" name="r_contraseña" id="r_contraseña" placeholder="Repetir Contraseña" value=<?php recuerda('r_contraseña')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'r_contraseña');
                                    ?>
                                </span>

                                <br><br>

                                <!-- FECHA -->
                                <label for="fecha">Fecha: <input type="text" name="fecha" id="fecha" placeholder="01-11-2023" value=<?php recuerda('fecha')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'fecha');
                                    ?>
                                </span>

                                <br><br>
                    
                                <label for="dni">DNI: <input type="text" name="dni" id="dni" placeholder="12345678A" value=<?php recuerda('dni')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'dni');
                                    ?>
                                </span>

                                <br><br>

                                <label for="email">Correo electrónico: <input type="text" name="email" id="email" placeholder="prueba@prueba.com" value=<?php recuerda('email')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'email');
                                    ?>
                                </span>

                                <br><br>                               

                                <!-- IMAGEN -->
                                <label for="fichero">Subir imagen <input type="file" name="fichero" id="fichero" value=<?php recuerda('fichero')?>></label>                                
                                <span class="error">
                                    <?php            
                                        errores($errores,'fichero');
                                    ?>
                                </span>


                                <br><br><br>

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