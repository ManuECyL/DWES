<?php
    require('./seguro/datos.php');
    require('./funciones.php');

    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

        if (!isAdmin() && !isUser()) {
            header('Location: ./index.php'); // Si no es ni usuario ni admin, lo lleva a la página index
            exit;
        }
        
    } else {
        header('Location: ./index.php'); // Si no existe el usuario lo lleva a esta página
        exit;
    }

    echo "Eres el usuario " . $_SERVER['PHP_AUTH_USER'];
?>

<h1>Página Usuario</h1>
<a href="./cerrar.php">Cerrar sesión</a>