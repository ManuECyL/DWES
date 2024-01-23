<?php

    class Producto {
        private $codProd;
        private $titulo;
        private $compañia;
        private $stock;
        private $precio;
        private $ruta_Imagen;

        function __construct($codProd, $titulo, $compañia, $stock, $precio, $ruta_Imagen) {
            $this -> codProd = $codProd;
            $this -> titulo = $titulo;
            $this -> compañia = $compañia;
            $this -> stock = $stock;
            $this -> precio = $precio;
            $this -> ruta_Imagen = $ruta_Imagen;
        }

        // Es una variable de variables, por eso en el return se pone el $ a la varible att
        public function __get($att) {

            // Si la clase contiene el atributo realiza el get
            if (property_exists(__CLASS__, $att)) {
                return $this -> $att;
            } 
        }

        // Para el __set se pasa el atributo y el valor que se quiere establecer
        public function __set($att, $val) {

            // Si la clase contiene el atributo realiza el set
            if (property_exists(__CLASS__, $att)) {
                $this -> $att = $val;
            
            } else {
                echo "No existe el att (atributo)";
            }
        }
    }
?>