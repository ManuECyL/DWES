<?php
require_once "./config/config.php";


session_start();
//Acceder al index de la app
//si esta logueado pero no tiene pagina a la que ir
if (isset($_REQUEST['logout'])) {
    unset($_SESSION['usuarioDAW205POO']); // Se destruye la sesión
    session_destroy(); //Se destruye la sesión
    header('Location: index.php'); //Se le redirige al index
    exit;
} else if (isset($_SESSION["usuarioDAW205POO"]) && !isset($_SESSION["pagina"])) {
    $controlador = $controladores["inicio"]; //Se almacena el controlador de inicio en la variable
    require_once $controlador; //Se incluye el controlador
} //si esta logueado y tiene donde ir
else if (isset($_SESSION["usuarioDAW205POO"]) && isset($_SESSION["pagina"])) {
    $controlador = $controladores[$_SESSION["pagina"]];
    //Se almacena el controlador de inicio en la variable
    require_once $controlador; //Se incluye el controlador
} else { // si no se ha logeado solo puede entrar en la pagina principal y el login
    if (!isset($_SESSION["vista"]) || isset($_REQUEST['home'])) {
        $_SESSION['vista'] = $vistas['login'];
        $controlador = $controladores['login'];
            require_once $controlador;
        require_once "./vista/layout.php";
    } // sino puede entrar al controlador que le haga falta
    else {
        //siguiente esta en el login manda al controlador del login
        if ($_SESSION["vista"] == $vistas['login']) {
            $controlador = $controladores['login'];
            require_once $controlador;
        }else// si ha pedido ir al login
            require_once "./vista/layout.php";

    }
}
