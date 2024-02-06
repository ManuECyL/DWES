<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (isset($_REQUEST['Apuesta_HacerApuesta'])) {

        if (isset($_REQUEST['numeros']) && count($_REQUEST['numeros']) == 5 ){
            $numerosSeleccionados = $_REQUEST['numeros'];
        
        } else {
            $sms = "Debes seleccionar 5 números";
            return;
        }

        $numeros = array_slice($numerosSeleccionados, 0, 5);

        $id_Usuario = $_SESSION['usuario'] -> codUsuario;
    
        $apuesta = new Apuesta(null, $id_Usuario, $numeros [0], $numeros [1], $numeros [2], $numeros [3], $numeros [4], date('Y-m-d'));

        try {
            ApuestaDAO::hacerApuesta($apuesta);
            $_SESSION['apuesta'] = $apuesta;
            $sms = "Apuesta realizada con éxito";
        
        } catch (Exception $e) {
            $sms = "No se ha podido realizar la apuesta";
        }
        
        unset($_SESSION['controller']);

    
    } elseif (isset($_REQUEST['Apuesta_ModificarApuesta'])) {

        
        if (isset($_REQUEST['numeros']) && count($_REQUEST['numeros']) == 5 ){
            $numerosSeleccionados = $_REQUEST['numeros'];
        
        } else {
            $sms = "Debes seleccionar 5 números";
            return;
        }

        $numeros = array_slice($numerosSeleccionados, 0, 5);

        $apuesta = $_SESSION['apuesta'];
        $apuesta -> numero1 = $numeros[0];
        $apuesta -> numero2 = $numeros[1];
        $apuesta -> numero3 = $numeros[2];
        $apuesta -> numero4 = $numeros[3];
        $apuesta -> numero5 = $numeros[4];
        $apuesta -> fechaApuesta = date('Y-m-d');

        $sorteoRealizado = SorteoDAO::comprobarSorteo($apuesta -> fechaApuesta);

        if ($sorteoRealizado) {
            $sms = "El sorteo ya se ha realizado, no se pueden hacer más apuestas";
            return;
        }

        try {
            ApuestaDAO::update($apuesta);
            $sms = "Apuesta modificada con éxito";
        
        } catch (Exception $e) {
            $sms = "No se ha encontrado la apuesta";
        }

        unset($_SESSION['controller']);

    
    } elseif (isset($_REQUEST['Apuesta_VerApuestas'])) {

        $id_Usuario = $_SESSION['apuesta'] -> id_Usuario;

        try {
            $array_apuestas = ApuestaDAO::findById($id_Usuario);      
        
        } catch (Exception $e) {
            $sms = "No tiene apuestas";
        }
                
        unset($_SESSION['controller']);
    }
?>