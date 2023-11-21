<?php

    class HeaderC extends FPDF {
        
        function Header() {
            // Establecer una fuente para el texto
            $this -> SetFont("Courier", "B", 20);

            // Establecer un color RGB para el texto 
            $this -> SetTextColor(100,100,100);

            // Seleccionar la posición de ancho en la que escribir posteriormente 
            $this -> SetX(60);

            // Escribir algo en la página
            $this -> Write(5, "DWES, Claudio Moyano");

            // Añadir un salto de línea
            $this -> Ln();
            $this -> Ln();
        }


        function Footer() {
            // Establecer una fuente para el texto
            $this -> SetFont("Courier", "B", 20);

            // Establecer un color RGB para el texto 
            $this -> SetTextColor(100,100,100);

            // Posición Alto del texto: Abajo cerca del lado derecho
            $this -> SetY(-20);

            // Posición Ancho del texto: Cerca del lado derecho
            $this -> SetX(-20);

            // Escribir número de página
            $this -> Write(5, $this -> PageNo());

            // Añadir un salto de línea
            $this -> Ln();
            $this -> Ln();
        }
    }

?>