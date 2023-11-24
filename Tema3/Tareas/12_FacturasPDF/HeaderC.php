<?php

    class HeaderC extends FPDF {
        
        function Header() {
                    
            // Imagen
            $this -> Image('./imagenes/StreetWear.png',-10,-10,70,75);


            // Establecer una fuente para la Marca
            $this -> SetFont("Courier", "B", 25);
            
            // Seleccionar la posición de ancho para  la marca 
            $this -> SetX(45);

            // Escribir Marca
            $this -> Write(10, "StreetWear");
            $this -> Ln();


            // Establecer una fuente para el resto de datos de la empresa
            $this -> SetFont("Courier", "I", 10);

            // Seleccionar la posición de ancho para el propietario
            $this -> SetX(50);

            // Escribir Propietario
            $this -> Write(5, "Manuel Chillon Prieto");
            $this -> Ln();


            // Seleccionar la posición de ancho para el CIF/NIF
            $this -> SetX(50);

            // Escribir CIF/NIF
            $this -> Write(5, "CIF/NIF: 84526734C");
            $this -> Ln();


            // Seleccionar la posición de ancho para la Calle
            $this -> SetX(50);

            // Escribir Calle
            $this -> Write(5, "Calle Mayor, 4");
            $this -> Ln();


            // Seleccionar la posición de ancho para el Código Postal
            $this -> SetX(50);

            // Escribir Código Postal
            $this -> Write(5, "CP: 49015 Zamora");
            $this -> Ln();


            // Seleccionar la posición de ancho para la Ciudad y País
            $this -> SetX(50);    

            // Escribir Ciudad y País
            $this -> Write(5, "Zamora, Espana");
            $this -> Ln();
        }


        function Footer() {
            // Establecer una fuente para el texto
            $this -> SetFont("Courier", "B", 20);

            // Establecer un color RGB para el texto 
            $this -> SetTextColor(100,100,100);

            // Posición Alto del texto: Abajo cerca del lado derecho
            $this -> SetY(-17);

            // Posición Ancho del texto: Cerca del lado derecho
            $this -> SetX(-20);

            // Escribir número de página
            $this -> Write(5, $this -> PageNo());


            // Posición Alto del texto: Centrada
            $this -> SetY(-20);

            // Posición Ancho del texto: Centrada
            $this -> SetX(80);

            // Escribir marca
            $this -> Write(10, "StreetWear");

            // Añadir un salto de línea
            $this -> Ln();
            $this -> Ln();
        }
    }
?>