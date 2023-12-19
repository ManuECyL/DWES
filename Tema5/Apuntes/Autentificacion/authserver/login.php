<?php
    require('./seguro/datos.php');
    require('./funciones.php');

    // Si existe usuario logeado
    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
        
        if (isUser()) { // Es un usuario?
            header('Location: ./paginaUser.php');
            exit;

        } elseif (isAdmin()) { // Es un admin?
            header('Location: ./paginaAdmin.php');
            exit;
        
        } else { // No es un usuario ni un admin
            header('WWW-Authenticate: Basic Realm="Contenido Restringido"'); // Volverse a autentificar
            header('HTTP/1.0 401 Unauthorized'); // Página de error
            exit;
        }

    // Si no se ha logeado nunca le pide login
    } else {
        header('WWW-Authenticate: Basic Realm="Contenido Restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
    }   

?>