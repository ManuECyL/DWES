<?php

if (isset($_REQUEST['Partida_ProbarLetra'])) {
    if (!str_contains($_SESSION['palabraOculta'], $_REQUEST['letra'])) { // validar que no es una letra repetida
        // convertir a arrays la palabra y la cadena oculta
        $arrPalabra = str_split($_SESSION['palabra']['palabra']);
        $arrCopia = str_split($_SESSION['palabraOculta']);

        $acierto = false;
        // recorrer array original y comprobar si coincide con la letra especificada
        for ($i = 0; $i < count($arrPalabra); $i++) {
            if ($arrPalabra[$i] == $_REQUEST['letra']) {
                $arrCopia[$i] = $_REQUEST['letra'];
                $acierto = true;
            }
        }
        // restar un intento si se ha fallado
        if (!$acierto)
            $_SESSION['intentos']--;
        // resetear cadena oculta
        $_SESSION['palabraOculta'] = "";
        foreach ($arrCopia as $letra) {
            $_SESSION['palabraOculta'] .= $letra;
        }
        
        if ($_SESSION['intentos'] === 0 && $_SESSION['palabra']['palabra'] != $_SESSION['palabraOculta']) {
            // final por intentos
            $arrDatos = array(
                "id_usuario"=>$_SESSION['usuario']->id_usuario,
                "id_palabra"=>$_SESSION['palabra']['id_palabra'],
                "resultado"=>"perdida",
                "intentos"=>6 - $_SESSION['intentos']
            );
            // insertar estadistica, mandar mensaje y cargar estadisticas
            post('estadisticas', $arrDatos); 
            $sms = "<p style='color:red;'>Has fallado, la palabra era: ". $_SESSION['palabra']['palabra'] . "</p>";
            $estadisticas = get('estadisticas/'.$_SESSION['usuario']->id_usuario);
            $estadisticas = json_decode($estadisticas, true);
            // volver a la pagina del juego
            $_SESSION['vista']= VIEW . 'juego.php';
            $_SESSION['controller'] = CON . 'JuegoController.php';
        } else if ($_SESSION['palabra']['palabra'] == $_SESSION['palabraOculta']) {
            // final por acierto
             $arrDatos = array(
                "id_usuario"=>$_SESSION['usuario']->id_usuario,
                "id_palabra"=>$_SESSION['palabra']['id_palabra'],
                "resultado"=>"ganada",
                "intentos"=>6 - $_SESSION['intentos']
            );
            // insertar estadistica, mandar mensaje y cargar estadisticas
            post('estadisticas', $arrDatos);
            $estadisticas = get('estadisticas/'.$_SESSION['usuario']->id_usuario);
            $estadisticas = json_decode($estadisticas, true);
            $sms = "<p style='color:green;'>Has acertado, la palabra era: ". $_SESSION['palabra']['palabra'] . "</p>";
            // volver a la pagina del juego
            $_SESSION['vista']= VIEW . 'juego.php';
            $_SESSION['controller'] = CON . 'JuegoController.php';
        }

    } else {
        $sms = "<p style='color:red;'>No puedes repetir letra </p>";
    }

}
