<?php
    include("./validaciones.php");
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
                                <a class="nav-link navTema" href="./index.php" id="anterior">Tarea 08</a>
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
                            mostrarTodo();

                        // Si hay algún error
                        } else {
                    ?>

                            <form action="" method="post" name="formulario1" enctype="multipart/form-data">

                            <!-- NOMBRE -->
                                <label for="nombre">Alfabetico: <input type="text" name="nombre" id="nombre" placeholder="Nombre" value=<?php recuerda('nombre')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'nombre');
                                    ?>
                                </span>

                                <br><br>

                            <!-- NOMBRE OPCIONAL -->
                                <label for="nombre">Alfabetico Opcional: <input type="text" name="nombreOp" id="nombreOp" placeholder="Nombre Opcional" value=<?php recuerda('nombreOp')?>></label>

                                <br><br>


                            <!-- APELLIDO -->
                                <label for="apellido">Alfanumérico: <input type="text" name="apellido" id="apellido" placeholder="Apellido" value=<?php recuerda('apellido')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'apellido');
                                    ?>
                                </span>

                                <br><br>

                            <!-- APELLIDO OPCIONAL -->
                                <label for="apellido">Alfanumérico Opcional: <input type="text" name="apellidoOp" id="apellidoOp" placeholder="Apellido Opcional" value=<?php recuerda('apellidoOp')?>></label>

                                <br><br>


                            <!-- NUMÉRICO -->
                                <label for="numérico">Numérico: <input type="text" name="numérico" id="numérico" placeholder="Numérico" value="<?php recuerda('numérico')?>"></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'numérico');
                                    ?>
                                </span>

                                <br><br>

                            <!-- NUMÉRICO OPCIONAL -->
                                <label for="numéricoOP">Numérico Opcional: <input type="text" name="numéricoOp" id="numéricoOp" placeholder="Numérico" value=<?php recuerda('numéricoOp')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'numéricoOp');
                                    ?>
                                </span>
                                <br><br><br>


                            <!-- FECHA - Formato de la fecha: dd-mm-yyyy -->
                                
                                <label for="fecha">Fecha: <input type="date" name="fecha" id="fecha" placeholder="Formato dd/mm/yyyy" value=<?php recuerda('fecha')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'fecha');
                                    ?>
                                </span>

                                <br><br>

                            <!-- FECHA OPCIONAL -->
                                <label for="fecha_n">Fecha Opcional: <input type="date" name="fechaOp" id="fechaOp" placeholder="Formato dd/mm/yyyy" value=<?php recuerda('fechaOp')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'fechaOp');
                                    ?>
                                </span>
                                <br><br><br>


                            <!-- RADIO -->
                                <p>Radio Obligatorio:</p>
                                <!-- 
                                    Si queremos que solo se pueda elegir 1, hay que poner el mismo name.
                                        value => Para determinar que queremos que se envíe.
                                -->
                                <label for="opcion1">Opcion1: <input <?php recuerdaRadio('radio', 'opcion1')?> type="radio" name="radio" id="opcion1" value="opcion1"></label>

                                <label for="opcion2">Opcion2: <input <?php recuerdaRadio('radio', 'opcion2')?> type="radio" name="radio" id="opcion2" value="opcion2"></label>

                                <label for="opcion3">Opcion3: <input <?php recuerdaRadio('radio', 'opcion3')?> type="radio" name="radio" id="opcion3" value="opcion3"></label>

                                <span class="error">
                                    <?php            
                                        errores($errores,'radio');
                                    ?>
                                </span>

                                <br><br>


                            <!-- SELECT -->
                                <p>Select</p>
                                <!-- 
                                    Primera opción con value = 0 y texto de seleccionar opción para ayudar al usuario y que esa opción no se envíe
                                    value => Para determinar que valor queremos que se envíe.
                                -->
                                <select name="select" id="">
                                    <option value="0">Seleccione una opción</option>
                                    
                                    <option value="Select1" <?php recuerdaSelect('select', 'Select1')?>>Select1</option>

                                    <option value="Select2" <?php recuerdaSelect('select', 'Select2')?>>Select2</option>

                                    <option value="Select3" <?php recuerdaSelect('select', 'Select3')?>>Select3</option>
                                </select>

                                <span class="error">
                                    <?php            
                                        errores($errores,'select');
                                    ?>
                                </span>

                                <br><br>


                            <!-- CHECK -->
                                <p>CheckBox</p>
                             <!-- 
                                Para enviar más de una del grupo, se envía el name con corchetes para que lo introduzca en un array.
                                value => Para determinar que valor queremos que se envíe.
                                -->
                                <span class="error">
                                    <?php            
                                        errores($errores,'checks');
                                    ?>
                                </span>

                                <?php
                                    generaChecks();
                                ?>

                                <br>

                    
                            <!-- TELÉFONO -->
                                <label for="telefono">Nº Teléfono: <input type="text" name="telefono" id="telefono" placeholder="654987321" value=<?php recuerda('telefono')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'telefono');
                                    ?>
                                </span>

                                <br><br>


                            <!-- EMAIL -->
                                <label for="email">Email: <input type="text" name="email" id="email" placeholder="prueba@prueba.com" value=<?php recuerda('email')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'email');
                                    ?>
                                </span>

                                <br><br>


                            <!-- CONTRASEÑA -->
                                <label for="contraseña">Contraseña: <input type="password" name="contraseña" id="contraseña" value=<?php recuerda('contraseña')?>></label>
                                <span class="error">
                                    <?php            
                                        errores($errores,'contraseña');
                                    ?>
                                </span>

                                <br><br>
                                

                            <!-- FICHERO - Fichero que recibe el servidor en $_FILES-->
                                <label for="fichero">Subir documento <input type="file" name="fichero" id="fichero" value=<?php recuerda('fichero')?>></label>                                
                                <span class="error">
                                    <?php            
                                        errores($errores,'fichero');
                                    ?>
                                </span>


                                <br><br><br>

                                <!-- Enviar o borrar la información mediante un botón-->
                                <input type="submit" value="Enviar" name="enviar" id="enviar">
                                <input type="submit" value="Borrar" name="borrar">

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