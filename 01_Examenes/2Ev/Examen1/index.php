<?php
    require_once("./config/config.php");

    // Entramos en la app por el index, por ello iniciamos la sesion aquí
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Si se pulsa el boton de Iniciar Sesion, irá al controlador del Login
    if (isset($_REQUEST['Login_IniciarSesion'])) {  
        $_SESSION['controller'] = CONTROLLER . 'LoginController.php';

    if (isset($_REQUEST['User_IniciarPartida'])) {
        $_SESSION['vista'] = VIEW . 'partida.php';
        $_SESSION['controller'] = CONTROLLER . 'PalabraController.php';
    }
      
    } elseif (isset($_REQUEST['VerTodasEstadisticas'])) {
        $_SESSION['vista'] = VIEW . 'verEstadisticas.php';
        $_SESSION['controller'] = CONTROLLER . 'EstadisticaController.php';    
    
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
