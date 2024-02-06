<?php

    class Palabra {
        private $id_palabra;
        private $palabra;
        private $num_letras;


        function __construct($id_palabra, $palabra, $num_letras) {
            $this -> id_palabra = $id_palabra;
            $this -> palabra = $palabra;
            $this -> num_letras = $num_letras;
    
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