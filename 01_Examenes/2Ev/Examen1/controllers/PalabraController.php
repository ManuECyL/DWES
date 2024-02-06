<?php

    if (isset($_REQUEST['User_IniciarPartida'])) {
        
        $palabra = PalabraDAO::findPalabra();

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