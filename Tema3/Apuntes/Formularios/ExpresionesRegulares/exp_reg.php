<?php
    $exp = '/maria/';
    echo preg_match($exp, 'maria es mi profe favorita');

// Uso del comodín
    echo "<br><br> Uso del comodin /mari.<br>";
    $exp = '/mari./';
    echo preg_match($exp, 'mario es mi profe favorita');
    echo preg_match($exp, 'maril es mi profe favorita');

// Uso de varios valores válidos
    echo "<br><br> Uso de o /maria o /mario <br>";
    $exp = '/mari[ao]/';
    echo preg_match($exp, 'mario es mi profe favorita');
    echo preg_match($exp, 'maril es mi profe favorita');

// Uso del Espacio
    echo "<br><br> Uso del espacio[letra]espacio <br>";
    $exp = '/\s[A-Za-z]\s/';
    $frase = 'Hoy es Halloween y salimos a tomar unas cervezas';
    echo $frase ."<pre>";

    $array = array();
    preg_match_all($exp, $frase, $array); // Muestra los valores que coinciden con la expresión regular y los añade en un array
    print_r($array);

    echo "</pre>";


// Uso Numérico
    echo "<br><br> Numérico \d <br>";
    // $exp = '/[0-9]/'; // Numérico que contenga del 0 al 9
    // $exp = '/\d\d/'; // Numérico con dos valores
    // $exp = '/\d+/'; // Cadena numérica repetida al una o más veces
    $exp = '/\d{4}/'; // Cadena numérica con 4 valores
    $frase = 'Hoy es 31 de Octubre de 2023 Halloween y salimos a tomar unas cervezas';
    echo $frase ."<pre>";

    $array = array();
    preg_match_all($exp, $frase, $array); 
    print_r($array);


// IBAN
echo "<br><br> IBAN <br>";
?>