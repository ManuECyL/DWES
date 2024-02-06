<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (isset($_REQUEST['VerTodasEstadisticas'])) {

        $array_estadisticas = EstadisticaDAO::findAll();
    
    } elseif (isset($_REQUEST['volver'])) {
        $_SESSION['vista'] = VIEW . 'admin.php';
    }
?>