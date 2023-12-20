<?php
    require('./funciones/validaciones.php');
    require('./funciones/logout.php');

    session_start();

    sesionIniciada();
    permisosPagina(basename($_SERVER['PHP_SELF']));

    if (cerrado()) {
        cerrarSesion();
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Pagina 2</title>

    </head>

    <body>
        
        <h1>Página 2</h1>

        <br><br>

        <form action="" method="post">
            <input type="submit" value="Cerrar Sesión" name="cerrar">
        </form>
    </body>

</html>