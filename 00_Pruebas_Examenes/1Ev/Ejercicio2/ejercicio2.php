<?php
    require("./validaciones.php");
    // require("./mostrar.php");
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Examen2</title>

    </head>

    <body>

        <style>
            *,
            input {
                margin: 10px;
            }

            h1 {
                text-align: center;
            }

            .error {
                color: red;
            }
        </style>

        <h1>Ejercicio 2</h1>

        <h2>Formulario Examen</h2>

        <br>

        <?php
            $errores = array();

            $array = array(
                "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
                "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
                "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
            );

            if(enviado() && validaFormulario($errores)) {
                // header('Location: ./Mostrar.php?nombre='.  $_REQUEST(mostrarTodo()));
                // exit();
                mostrarTodo();

            } else {


        ?>

            <form action="./ejercicio2.php" method="post" enctype="multipart/form-data">

                <!-- NOMBRE -->
                <p>
                    <label for="idNombre">Nombre y Apellidos:</label>
                    <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php recuerda('nombre')?>">
                    <span class="error">
                        <?php            
                            errores($errores,'nombre');
                        ?>
                    </span>
                </p>
               

                <!-- EXPENDIENTE -->
                <p>
                    <label for="idExpediente">Expediente:</label>
                    <input type="text" name="expediente" id="idExpediente" placeholder="11AAA/22" value=<?php recuerda('expediente')?>>
                    <span class="error">
                        <?php            
                            errores($errores,'expediente');
                        ?>
                    </span>
                </p>

                <!-- COMBOBOX -->
                <p><b>Curso:</b>

                    <?php
                        generaCombo();
                    ?>

                    <span class="error">
                        <?php            
                            errores($errores,'cursos');
                        ?>
                    </span>

                </p>


                <!-- CHECKBOX -->
                <p><b>Asignaturas:</b>

                    <span class="error">
                        <?php            
                            errores($errores,'asignaturas');
                        ?>
                    </span>

                    <?php
                        generaChecks();
                    ?>
                </p>

                <br>

                <input type="hidden" name="curso" value="">
                <br>
                <input type="submit" value="Enviar" name="enviar" style=width:170px>

            </form>
            
            <?php

                }
            ?>      
    </body>
</html>