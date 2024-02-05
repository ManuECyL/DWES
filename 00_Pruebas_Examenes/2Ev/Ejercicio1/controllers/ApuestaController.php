<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (isset($_REQUEST['Apuesta_HacerApuesta'])) {

        if (isset($_REQUEST['numeros']) && count($_REQUEST['numeros']) >= 5){
            $numerosSeleccionados = $_REQUEST['numeros'];
        
        } else {
            $sms = "Debes seleccionar al menos 5 números";
            return;
        }

        $numeros = array_slice($numerosSeleccionados, 0, 5);

        $apuesta = new Apuesta(null, $_SESSION['usuario'] -> id_Usuario, $numeros [0], $numeros [1], $numeros [2], $numeros [3], $numeros [4], date('Y-m-d'));

        if (ApuestaDAO::hacerApuesta($apuesta)) {
            $sms = "Apuesta realizada con éxito";
        
        } else {
            $sms = "No se ha podido realizar la apuesta";
        }

        unset($_SESSION['controller']); 
    
    } elseif (isset($_REQUEST['Apuesta_ModificarApuesta'])) {

        $apuesta = ApuestaDAO::update($_SESSION['usuario']);

        if ($apuesta) {
            $_SESSION['apuesta'] = $apuesta;
        
        } else {
            $sms['apuesta'] = "No se ha encontrado la apuesta";
        }

        unset($_SESSION['controller']);

    
    } elseif (isset($_REQUEST['Apuesta_VerApuestas'])) {
            
            $apuestas = ApuestaDAO::findById($_SESSION['usuario']);
    
            if ($apuestas) {
                $_SESSION['apuestas'] = $apuestas;
            
            } else {
                $sms['apuestas'] = "No se han encontrado apuestas";
            }
    
            unset($_SESSION['controller']);
    }
?>