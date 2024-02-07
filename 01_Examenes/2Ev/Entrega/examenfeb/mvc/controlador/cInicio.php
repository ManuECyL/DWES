<?php

// Si se pulsa el botón para salir
if (isset($_REQUEST['logout'])) {
    unset($_SESSION['usuarioDAW205POO']); // Se destruye la sesión
    session_destroy(); //Se destruye la sesión
    header('Location: index.php'); //Se le redirige al index
    exit;
} else if (isset($_REQUEST['iniciar'])) {
    $_SESSION['controlador'] =$controladores['partida'];
    $_SESSION['vista'] =$vistas['partida'];
    $_SESSION['pagina'] ='partida';
    require $controladores['partida'];
    require_once $vistas["partida"];
    exit;
} else {

    if($_SESSION['usuarioDAW205POO']->tipo == 'user')
        $partidasJugadas = EstadisitcaPDO::findByUser($_SESSION['usuarioDAW205POO']->id);
    else 
        $partidasJugadas = EstadisitcaPDO::findAll();
    $partidasJugadas = json_decode($partidasJugadas, true);
}




$_SESSION['vista'] = $vistas['inicioL']; //Se carga en la sesión de vistas, la que queremos
require_once $vistas['layout']; //se incluye la vista que contiene la $_SESSION['vista']
