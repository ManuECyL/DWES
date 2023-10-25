<?php
// Todas las funciones deben tener estas características:
//     Nombre = Edad -> (Obligatorio y Único)
//     Argumentos = ano mes dia -> (Opcional)
//     Valor
//     Return = annos -> (Opcional)

    function edad($ano, $mes, $dia) {
        
        $fecha1 = new DateTime($ano . "-" . $mes . "-" . $dia);
        $fecha2 = new DateTime();

        $annos = ($fecha1 -> diff($fecha2)) -> y;

        return $annos;
    }

// Función de IVA siempre con el 21%, salvo cuando se especifique otro porcentaje al llamar la función
    function iva($precio, $ivaP = 0.21) {

        return $precio * $ivaP;
    }


    function añadirAlArray(&$array, $value) {
        
        $ultimo = count($array);
        $array[$ultimo] = $value;
    }

?>