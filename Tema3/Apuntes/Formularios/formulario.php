<?php
    include("./validaciones.php");
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Formulario</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <style>
            body{
                text-align: center;
            }

            p{
                font-weight: bold;
            }
        </style>

        <link rel="stylesheet" href="./css/error.css">
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
                                <a class="nav-link navTema" href="../index.php" id="anterior">Apuntes Tema 3</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px; text-align: center;">

                    <br>

                    <h1>FORMULARIO BÁSICO</h1>

                    <br>

                    <?php
                        $errores = array();

                        // Si ha ido todo bien
                        if (enviado() && validaFormulario($errores)) {
                            echo "<pre>";
                            print_r($_REQUEST);

                        // Si hay algún error
                        } else {
                    ?>

                        <!-- 
                        Un formulario sirve para enviar datos del usuario/cliente al servidor:

                            action => Donde se quieren enviar los datos. Si no se le da un fichero, llama a la página actual.

                            method => Como se envían los datos (GET en la URL / POST oculto en la cabecera).

                            name => Necesario para JavaScript, pero para PHP no

                            enctype => Para poder enviar ficheros.
                        -->

                            <!-- <form action="procesa.php" method="post" enctype="multipart/form-data" name="formulario1" target="_blank"> -->
                            <form action="" method="get" name="formulario1" enctype="multipart/form-data">

                                <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" placeholder="Nombre" value=<?php recuerda('nombre')?>></label>
                                <span class="error">
                                    <?php            
                                    errores($errores,'nombre');
                                    ?>
                                </span>

                                <br><br>

                                <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido" placeholder="Apellido" value=<?php recuerda('apellido')?>></label>
                                <span class="error">
                                    <?php            
                                    errores($errores,'apellido');
                                    ?>
                                </span>

                                <br><br>

                                <p>Género:</p>
                                <!-- 
                                    Si queremos que solo se pueda elegir 1, hay que poner el mismo name.
                                        value => Para determinar que queremos que se envíe.
                                -->
                                <label for="hombre">Hombre:<input 
                                    <?php 
                                        recuerdaRadio('genero', 'hombre');
                                    ?>
                                type="radio" name="genero" id="hombre" value="hombre"></label>

                                <label for="mujer">Mujer:<input 
                                    <?php 
                                        recuerdaRadio('genero', 'mujer');
                                    ?>
                                type="radio" name="genero" id="mujer" value="mujer"></label>

                                <span class="error">
                                    <?php            
                                    errores($errores,'genero');
                                    ?>
                                </span>

                                <br><br><br>

                                <p>Aficiones (Al menos una):</p>
                                <!-- 
                                    Para enviar más de una del grupo, se envía el name con corchetes para que lo introduzca en un array.
                                        value => Para determinar que valor queremos que se envíe.
                                -->
                                <label for="ch1">Montar a caballo <input <?php recuerdaCheck('aficion', 'jinete')?> type="checkbox" name="aficion[]" id="ch1" value="jinete"></label>

                                <label for="ch2">Jugar al fútbol <input <?php recuerdaCheck('aficion', 'futbolista')?> type="checkbox" name="aficion[]" id="ch2" value="futbolista"></label>
                                
                                <label for="ch3">Nadar <input <?php recuerdaCheck('aficion', 'nadador')?> type="checkbox" name="aficion[]" id="ch3" value="nadador"></label>

                                <span class="error">
                                    <?php            
                                    errores($errores,'aficion');
                                    ?>
                                </span>

                                <br><br><br><br>

                                <!-- 
                                    Formato de la fecha: AAAA-mm-dd
                                -->
                                <label for="fecha_n">Fecha Nacimiento: <input type="datetime-local" name="fecha_n" id="fecha_n" value=<?php recuerda('fecha_n')?>></label>
                                <span class="error">
                                    <?php            
                                    errores($errores,'fecha_n');
                                    ?>
                                </span>

                                <br><br><br>

                                <p>Equipos Baloncesto</p>
                                <!-- 
                                    Primera opción con value = 0 y texto de seleccionar opción para ayudar al usuario y que esa opción no se envíe
                                    value => Para determinar que valor queremos que se envíe.
                                -->
                                <select name="equipos" id="">
                                    <option value="0">Seleccione una opción</option>
                                    
                                    <option value="Lakers" <?php recuerdaSelect('equipos', 'Lakers')?>>Lakers</option>

                                    <option value="Celtics" <?php recuerdaSelect('equipos', 'Celtics')?>>Celtics</option>

                                    <option value="Bulls" <?php recuerdaSelect('equipos', 'Bulls')?>>Bulls</option>
                                </select>

                                <span class="error">
                                    <?php            
                                    errores($errores,'equipos');
                                    ?>
                                </span>

                                <br><br><br><br>

                                <!-- Fichero que recibe el servidor en $_FILES-->
                                <input type="file" name="fichero" id="fichero" value=<?php recuerda('fichero')?>>
                                <span class="error">
                                    <?php            
                                        errores($errores,'fichero');
                                    ?>
                                </span>

                                <br><br>

                                <!-- No se visualiza en la página, pero da información al programador -->
                                <input type="hidden" name="usuarioVIP" value="156">

                                <br><br>

                                <!-- Enviar o borrar la información mediante un botón-->
                                <input type="submit" value="Enviar" name="enviar">
                                <input type="submit" value="Borrar" name="borrar">

                                <br><br>  
                            </form>

                    <?php // Abrir php
                        } // Cerrar el else
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