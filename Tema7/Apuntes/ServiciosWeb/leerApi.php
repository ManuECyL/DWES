<?php

    // uri de la api con: codigo de la ciudad(303121 - Zamora) y 2 parametros(apikey y idioma)
    $uri = 'http://dataservice.accuweather.com/forecasts/v1/daily/1day/303121?apikey=JbpqzMYAP7RgfASbKueE7AlsZl01krWg&language=es-es';

    // Devuelve todo lo que contenga el fichero php de la $uri
    $contenido = file_get_contents($uri);

    echo "<pre>";

        // Si hay contenido
        if ($contenido) {
            
            // Pasar el contenido nativo de php, es decir, un string, a un formato JSON. Al poner true convierte el JSON en un array asociativo
            $jsonContenido = json_decode($contenido, true);

            // print_r($jsonContenido);

            // Sale por defecto en Farenheit. Línea de código escrita en la variable del depurador
            $f = (int)$jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value'];

            // Los modificamos a Celsius
            $grados = ($f - 32) * 5 / 9; 
            
            echo "La temperatura minima es: " . $grados;
        }

    echo "</pre>";

?>