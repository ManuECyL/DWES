<?php

$uri = 'http://dataservice.accuweather.com/forecasts/v1/daily/1day/303121?apikey=N80aDXLfQnfRczkqPgbifxQQ9Vt5z9EX&language=es-es' ;

$contenido = file_get_contents($uri);

echo '<pre>';
if($contenido){
    $jsonContenido = json_decode($contenido,true);
    //print_r($jsonContenido);
    $f = (int)$jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value']
    $grados = ($f- 32)*5/9;

    echo "La temperatura mínima es; ".  $grados ;
}