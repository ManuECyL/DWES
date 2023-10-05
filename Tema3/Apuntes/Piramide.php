<?php
    $lineas = 4;

    for ($i = 0; $i < $lineas; $i++) { 
        
        for ($espacio = $lineas - 1; $espacio >= $i; $espacio--) { 
            echo "&nbsp;";
            echo "&nbsp;";
        }

        for ($asterisco = 1; $asterisco <= $i + 2; $asterisco + 2) { 
            echo "*";
        }

        echo "<br><br>";
    }


?>