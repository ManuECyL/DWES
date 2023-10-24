<?php
    include("./validaciones.php");
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Formulario</title>

        <style>
            body{
                text-align: center;
            }

            p{
                font-weight: bold;
            }
        </style>

        <link rel="stylesheet" href="./css/estilo.css">
    </head>

    <body>

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
                <form action="" method="post" name="formulario1" enctype="multipart/form-data">

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

                </form>

        <?php // Abrir php
            } // Cerrar el else
        ?> <!-- Cerrar el php -->
        
    </body>
</html>