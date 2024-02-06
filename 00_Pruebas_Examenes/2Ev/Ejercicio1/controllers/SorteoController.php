<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (isset($_REQUEST['Sorteo_VerApuestasTodas'])) {
        $array_apuestas = ApuestaDAO::findAll();

    } elseif (isset($_REQUEST['volver'])) {
        $_SESSION['vista'] = VIEW . 'sorteo.php';
    
    } elseif (isset($_REQUEST['Sorteo_RealizarSorteo'])) {

        // URL de la API REST
        $apiUrl = "http://ruta/a/tu/api";

        // Realiza una solicitud GET a la API REST
        $json = file_get_contents($apiUrl);

        $array_apuestas = ApuestaDAO::findAll();

        // Decodifica la respuesta JSON
        $data = json_decode($json, true);

        // Verifica si la respuesta contiene los números del sorteo
        if (isset($data['numero1'], $data['numero2'], $data['numero3'], $data['numero4'], $data['numero5'])) {

            // Crea un nuevo sorteo con los números y la fecha actual
            $sorteo = new Sorteo(
                null,
                $sorteo->numero1 = $data['numero1'],
                $sorteo->numero2 = $data['numero2'],
                $sorteo->numero3 = $data['numero3'],
                $sorteo->numero4 = $data['numero4'],
                $sorteo->numero5 = $data['numero5'],
                $sorteo->fechaSorteo = date('Y-m-d H:i:s')
            );

            // Guarda el sorteo en la base de datos
            SorteoDAO::realizarSorteo($sorteo);

        } else {
            echo "La respuesta de la API no contiene los números del sorteo.";
        }

    }
?>