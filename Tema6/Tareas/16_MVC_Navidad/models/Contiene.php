<?php

    class Contiene {
        private $id_Compra;
        private $cod_Prod;
        private $cantidad;
        private $total;

        function __construct($id_Compra, $cod_Prod, $cantidad, $total) {
            $this -> id_Compra = $id_Compra;
            $this -> cod_Prod = $cod_Prod;
            $this -> cantidad = $cantidad;
            $this -> total = $total;
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