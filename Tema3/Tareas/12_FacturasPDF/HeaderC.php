<?php

// include();

class HeaderC extends FPDF {
    
    function Header() {
                   
            
            // crearMarca($pdf);
            
        }


        function Footer() {
   
        }
}

function crearMarca($pdf) {

    $marca = array("StreetWear SL","Manuel Chillón Prieto","CIF/NIF: 84720672C","Calle Balborraz nº4","CP: 49012","Zamora España");

    foreach ($marca as $indice => $dato) {
        $pdf -> Cell(45,10,$dato,0,0,'C', true);
    }
}


?>