<?php

    class Sorteo {
        private $id_Sorteo;
        private $fechaSorteo;
        private $numero1;
        private $numero2;
        private $numero3;
        private $numero4;
        private $numero5;

        function __construct($id_Sorteo, $fechaSorteo, $numero1, $numero2, $numero3, $numero4, $numero5) {
            $this -> id_Sorteo = $id_Sorteo;
            $this -> fechaSorteo = $fechaSorteo;
            $this -> numero1 = $numero1;
            $this -> numero2 = $numero2;
            $this -> numero3 = $numero3;
            $this -> numero4 = $numero4;
            $this -> numero5 = $numero5;
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