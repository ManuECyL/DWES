<?php

    function numAleatorios(&$array, $min, $max, $numeros, &$repetirse) {

        for ($i = 0; $i < $numeros; $i++) { 
            
            $num = rand($min, $max);

            array_push($array, $num);

            // echo $num . "\n";

            // if ($repetirse && (array_values($array) != $num)) {
            //     array_push($array, $num);

            //     print_r($array);

            // }
        }    

        print_r($array);
    }

?>  