<?php

// Nave Espacial
    echo 4 <=> 5;
    echo "<br>";
    echo 5 <=> 5;
    echo "<br>";
    echo 6 <=> 5;
    echo "<br>";

    echo 5 & 3;
    echo "<br>";
    echo 5 | 3;
    echo "<br>";


// Sentencias condicionales
    
    // If
    if (4 > 3) {
        echo "Mayor" . "<br>";
        echo "Mayor";

    } elseif (3 < 4) {
        echo "Menor";
    
    } else 
        echo "Igual";

    // Switch
    // switch ($variable) {
    //     case 'value':
    //         # code...
    //         break;
        
    //     default:
    //         # code...
    //         break;
    // }

    echo "<br>";

// Sentencias de bucle

    // While
    $a = 1;

    while ($a <= 10) {
        echo $a;
        $a++;
    }

    echo "<br>";

    // Do While
    // do {
    //     # code...
    // } while ($a <= 10);


    // For
    for ($i=0; $i < 10; $i++) { 
        echo $i;
    }

    echo "<br>";

    // For each
    // foreach ($_SERVER as $key => $value) {
    //     echo "<br>Clave: " . $key . " Valor: " . $value;
    // }
    foreach ($_SERVER as $value) {
        echo "<br>Valor: " . $value;
    }

?>