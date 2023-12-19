<?php
    require('./seguro/datos.php');
    require('./funciones.php');

    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
        
        if (!isAdmin()) {
            header('Location: ./index.php'); // Si no es admin, lo lleva a la página index
            exit;
        } 

    } else {
        header('Location: ./index.php'); // Si no existe el usuario, lo lleva a esta página
        exit;
    }
?>

<h1>Página Admin</h1>
<a href="./cerrar.php">Cerrar sesión</a>