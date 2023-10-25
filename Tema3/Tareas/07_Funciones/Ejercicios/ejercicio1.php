<?php
// Pinta un <br>
    function br() {
        echo "<br>";
    }

// Muestra la cadena entre etiquetas <h1>
    function h1($cadena) {
        echo "<h1>$cadena</h1>";
    }

// Muestra la cadena entre etiquetas <p>    
    function p($cadena) {
        echo "<p>$cadena</p>";
    }

// Mostrar nombre del fichero actual
    function self() {
        echo basename(__FILE__);;
    }

// Devuelve la letra que le corresponde al DNI introducido
    function letraDni($dni) {
        $resto = $dni % 23;
        $letra = 'TRWAGMYFPDXBNJZSQVHLCKE';

        echo $letra[$resto];
    }
?>  
  



