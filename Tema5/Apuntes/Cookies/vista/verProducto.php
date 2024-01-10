<?php
    require('../funciones/funcionesBD.php');
    require('../funciones/funciones.php');
    
    if (!isset($_REQUEST['id'])) {
        header('Location: home.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="../weebroot/css/style.css"></script>

        <title>Ver Producto</title>

    </head>

    <body>

        <a href="home.php">Volver</a>

        <?php
            $producto = findById($_REQUEST['id']);

            if ($producto) {
                // Crear Cookie
                insertarCookie($_REQUEST['id']);

                echo "<h1>". $producto['nombre'] ."</h1>";
                echo "<p>". $producto['descripcion'] ."</p>";
                echo "<img src='../" . $producto['alta'] ."'>";               
            }

        ?>
        
    </body>

</html>