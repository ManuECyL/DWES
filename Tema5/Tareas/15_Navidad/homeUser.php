<?php
    require('./funciones/validaciones.php');
    require('./funciones/conexionBD.php');
    require('./funciones/logout.php');

    // Siempre que se cambia de página, hay que iniciar sesión para que el navegador acceda a nuestro id mediante las cookies y sepa quienes somos, para así diferenciarnos de otros usuarios 
    session_start(); 

    if (!isset($_SESSION['usuario'])) {

        $_SESSION['error'] = "No tiene permisos para entrar en PaginaUser";

        header('Location: ./login.php');
        exit;
 
    
    } elseif (cerrado()) {
        cerrarSesion();
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Pagina Usuario</title>

    </head>

    <body>
        <h1>Página User</h1>
        
        <?php
            echo "Bienvenido: " . $_SESSION['usuario']['nombre'];
            echo "<br><br>";

            if (isset($_SESSION['error'])) {
                echo "<span style='color:red'>". $_SESSION['error'] ."</span>";
            }

            echo "<br><br>";

            $paginas = misPaginas();

            echo "Puedes acceder a las páginas: ";

            echo "<ul>";

            foreach ($paginas as $pagina) {
                echo "<li><a href='./". $pagina ."'>". $pagina ."</a></li>";
            }

            echo "</ul>";
        ?>

        <br>

        <form action="" method="post">
            <input type="submit" value="Cerrar Sesión" name="cerrar">
        </form>
    </body>

</html>