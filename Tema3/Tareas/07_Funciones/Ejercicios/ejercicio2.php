<?php

    function numAleatorios(&$array, $min, $max, $numeros, $repetirse) {

        $rango = $max - $min + 1;

        // Verifica si la cantidad de números a generar es mayor que el rango
        if ($repetirse || $numeros <= $rango) {

            for ($i = 0; $i < $numeros; $i++) { 
                
                $numero = rand($min,$max);

                // Verifica si se permiten repeticiones o si el número no está en el array
                while (!$repetirse && in_array($numero, $array)) {
                    $numero = rand($min, $max);
                }
    
                // Agrega el número al array
                $array[] = $numero;
            }

            return true; 

        } else {
            // Si no se permiten repeticiones y la cantidad es mayor que el rango, devuelve false
            echo 'Error: No se pueden generar ' . $numeros . ' números distintos en el rango [' . $min . ', ' . $max . ']';

            return false;
        }
    }
?>  

