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

            if (enviado()) {

                if (textVacio('nombre')) 
                    $errores['nombre'] = "Nombre Vacío";

                if (textVacio('apellido')) 
                    $errores['apellido'] = "Apellido Vacío";
            }

        ?>

        <!-- <form action="procesa.php" method="post" enctype="multipart/form-data" name="formulario1" target="_blank"> -->
        <form action="" method="post" enctype="multipart/form-data" name="formulario1">

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
                   errores($errores,'apellido') ;
                ?>
            </span>

            <br><br>

            <p>Género:</p>
            <label for="hombre">Hombre:<input type="radio" name="genero" id="hombre" value="hombre"></label>
            <label for="mujer">Mujer:<input type="radio" name="genero" id="mujer" value="mujer"></label>

            <br><br><br>

            <p>Aficiones:</p>
            <label for="ch1">Montar a caballo<input type="checkbox" name="aficion[]" id="ch1" value="jinete"></label>
            <label for="ch2">Jugar al futbol<input type="checkbox" name="aficion[]" id="ch2" value="futbolista"></label>
            <label for="ch3">Nadar<input type="checkbox" name="aficion[]" id="ch3" value="nadador"></label>

            <br><br><br><br>

            <label for="fecha_n">Fecha Nacimiento<input type="datetime-local" name="fecha_n" id="fecha_n"></label>

            <br><br><br>

            <p>Equipos Baloncesto</p>
            <select name="equipos" id="">
                <option value="0">Seleccione una opción</option>
                <option value="Lakers">Lakers</option>
                <option value="Celtics">Celtics</option>
                <option value="Bulls">Bulls</option>
            </select>

            <br><br><br><br>

            <input type="file" name="fichero" id="fichero">

            <br><br>

            <input type="hidden" name="usuarioVIP" value="156">

            <br><br>

            <input type="submit" value="Enviar" name="enviar">
            <input type="reset" value="Borrar" name="borrar">

        </form>
        
    </body>
</html>