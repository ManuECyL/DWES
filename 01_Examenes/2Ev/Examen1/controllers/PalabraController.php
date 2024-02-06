<?php

    if (isset($_REQUEST['User_IniciarPartidaAleatorio'])) {
        
        $array_palabras = PalabraDAO::findPalabraRand();

    } elseif (isset($_REQUEST['User_IniciarPartidaMin'])) {
        
        try {
            $palabra = PalabraDAO::findByNum($_REQUEST['minLetras']);

            $_SESSION['palabra'] = $palabra;
        
        } catch (Exception $e) {
            $sms = "Debe introducir un numero minimo de letras";
        }

    } elseif (isset($_REQUEST['Letra_Enviar'])) {

        try {
            $palabra = PalabraDAO::findByPalabra($palabra);
        
        } catch (Exception $e) {
            $sms = "Debe introducir un numero minimo de letras";
        }
    
    
    } elseif (isset($_REQUEST['volver'])) {
        $_SESSION['vista'] = VIEW . 'user.php';
    }

    // if (isset($_REQUEST['User_IniciarPartida'])) {

    //     // URL de la API REST
    //     $uri = "http://192.168.7.207/01_Examenes/2Ev/API/api";

    //     // Realiza una solicitud GET a la API REST
    //     $contenido = file_get_contents($uri);

    //     if ($contenido) {

    //         // $array_apuestas = PalabraDAO::findPalabra();

    //         // Decodifica la respuesta JSON
    //         $palabra = json_decode($contenido, true);

    //         echo "La palabra es: " . $palabra;
    //     }


    // } else {
    //     echo "No hay respuesta de la API";
    // }

?>