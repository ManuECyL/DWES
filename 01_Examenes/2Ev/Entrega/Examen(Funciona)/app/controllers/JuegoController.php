<?php


if (isAdmin()) {
    // cargar estadisticas
    $estadisticas = get('estadisticas');
    $estadisticas = json_decode($estadisticas, true);

} else {
    // cargar estadisticas
    $estadisticas = get('estadisticas/'.$_SESSION['usuario']->id_usuario);
    $estadisticas = json_decode($estadisticas, true);
    // iniciar partida aleatoria
    if (isset($_REQUEST['Juego_IniciarPartida'])) {
        $palabra = get('palabras');
        $palabra = json_decode($palabra, true);
        $_SESSION['palabra'] = $palabra[0];
        $palabraOculta = "";
        for ($i = 0; $i < strlen($_SESSION['palabra']['palabra']); $i++) {
            $palabraOculta .= "*";
        }
        // definir lo necesario para iniciar la partida
        $_SESSION['intentos'] = 6;
        $_SESSION['palabraOculta'] = $palabraOculta;
        $_SESSION['vista'] = VIEW . 'partida.php';
        $_SESSION['controller'] = CON . 'PartidaController.php';
        // iniciar partida con minimo 
    } else if (isset($_REQUEST['Juego_IniciarPartidaMin'])) {
        if (!empty($_REQUEST['min'])) {
            $palabra = getMin('palabras?min="' . $_REQUEST['min'] . '"');
            $palabra = json_decode($palabra, true);
            $_SESSION['palabra'] = $palabra;
            $palabraOculta = "";
            for ($i = 0; $i < strlen($_SESSION['palabra']['palabra']); $i++) {
                $palabraOculta .= "*";
            }
            // definir lo necesario para iniciar la partida
            $_SESSION['intentos'] = 6;
            $_SESSION['palabraOculta'] = $palabraOculta;
            $_SESSION['vista'] = VIEW . 'partida.php';
            $_SESSION['controller'] = CON . 'PartidaController.php';
        } else {
            $sms = "<p style='color:red'>Debes especificar el numero de letras</p>";
        }
    }
}
