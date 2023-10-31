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

    echo "</pre>";

// Uso de no contiene ^
    echo "<br><br> Uso de no contiene ^<br>";
    $exp = '/mari[^ao]/';
    echo preg_match($exp, 'mario es mi profe favorita');
    echo preg_match($exp, 'maril es mi profe favorita');


// IBAN
    echo "<br><br> IBAN <br>";
    $exp_IBAN = '/^[A-Z]{2}\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/'; // ^ -> No puede haber nada delante. $ -> No puede haber nada detrás.
    $IBAN = "ES00 0000 0000 00 0000000000";
    echo preg_match($exp_IBAN, $IBAN);


// nov, noviembre, november
    echo "<br><br> nov, noviembre, november <br>";
    $exp_Nov = '/^nov(iembre|ember)?$/';
    echo preg_match($exp_Nov, 'novi');
    echo preg_match($exp_Nov, 'nov');
    echo preg_match($exp_Nov, 'noviembre');
    echo preg_match($exp_Nov, 'november');
    echo preg_match($exp_Nov, 'anov');
    echo preg_match($exp_Nov, 'novemberp');


// Nombres de los dias que acaban en 'es' dentro de un Array
    echo "<br><br> Nombres de los dias que acaban en 'es' dentro de un Array<br>";
    $array = ['Lunes', 'Martes', 'Sabado'];
    $exp_Esp = '/es$/';
    print_r(preg_grep($exp_Esp, $array));


// Reemplazar Datos Array -> Numeros preg_replace()
    echo "<br><br> Reemplazar Datos Array - Numeros preg_replace()<br>";
    $array = [1, 'a', 'B', 4];
    $patron = '/^\d$/';
    $cambio = 'numero';
    print_r(preg_replace($patron, $cambio, $array));


// Reemplazar Varios Datos Array 
    echo "<br><br> Reemplazar Varios Datos Array<br>";
    $array = [1, 'a', 'B', 4];
    $patron = ['/^\d$/','/^\D$/']; // Dos patrones distintos
    $cambio = ['numero', 'letra']; // Valores asociados a los patrones respectivamente
    print_r(preg_replace($patron, $cambio, $array));


// Reemplazar Datos Array -> Numeros - preg_filter
    echo "<br><br> Reemplazar Datos Array - Numeros preg_filter()<br>";
    $array = [1, 'a', 'B', 4];
    $patron = '/^\d$/';
    $cambio = 'numero';
    print_r(preg_filter($patron, $cambio, $array));

    echo "<br><br>";


// Reemplazar valor de la frase que coincida con el patron por el valor indicado 
    $frase = 'maria es mi profe favorita';
    $patron = '/a/';
    $cambio = '@';
    print_r(preg_filter($patron, $cambio, $frase));

    echo "<br><br>";


// Formato fecha correcto
    $frase = 'Si hay una fecha 1/2/2012 esta bien, pero 1/2/2021 mal, 15/12/21 mal';

    // Si el mes y el dia tienen solo 1 digito, añado 0 delante.
    // Si el año tiene 2 dígitos: si es <= 23 añado 20 delante y si es > 23 añado 19 delante 

    function corrige($coincide) {

        print_r($coincide);

        if ($coincide[1] < 10 && strlen($coincide[1]) != 2) {
            $coincide[1] = '0'.$coincide[1];
        }

        if ($coincide[3] < 10 && strlen($coincide[3]) != 2) {
            $coincide[3] = '0'.$coincide[3];
        }

        if ($coincide[5] <= 23) {
            $coincide[5] = '20'.$coincide[5];
        
        } elseif ($coincide[5] > 23 && $coincide[5] < 100) {
            $coincide[5] = '19'.$coincide[5];
        }

        echo "<br>";

        return $coincide[1].$coincide[2].$coincide[3].$coincide[4].$coincide[5];
    }

    $exp_Fecha = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
    // preg_match_all($exp_Fecha, $frase, $array);
    echo "<pre>";
    // print_r($array);
    print_r(preg_replace_callback($exp_Fecha, 'corrige', $frase));
?>