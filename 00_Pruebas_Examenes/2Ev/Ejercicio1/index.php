<?php
    require_once("./config/config.php");

    // Entramos en la app por el index, por ello iniciamos la sesion aquí
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_REQUEST['Login_IniciarSesion'])) {  
        $_SESSION['controller'] = CONTROLLER . 'LoginController.php';

    } elseif (isset($_REQUEST['Apuesta_HacerApuesta'])) {
        $_SESSION['controller'] = CONTROLLER . 'ApuestaController.php';

    } elseif (isset($_REQUEST['Apuesta_ModificarApuesta'])) {
        $_SESSION['controller'] = CONTROLLER . 'ApuestaController.php';

    } elseif (isset($_REQUEST['Apuesta_VerApuestas'])) {
        $_SESSION['controller'] = CONTROLLER . 'ApuestaController.php';
    
      
    } elseif (isset($_REQUEST['logout'])) {
        // Hasta que no se recarga la página, no expira
        session_destroy();
        // Si destruimos la sesión, debemos recargar la página
        header('Location: ./'); 
    }
 

    if (isset($_SESSION['controller'])) {
        require($_SESSION['controller']);
    }

    
    require("./views/layout.php");
?>
