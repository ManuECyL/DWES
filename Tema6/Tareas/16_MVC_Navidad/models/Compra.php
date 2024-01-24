<?php

    class Compra {
        private $id_Compra;
        private $id_Usuario;
        private $fecha_Compra;

        function __construct($id_Compra, $id_Usuario, $fecha_Compra) {
            $this -> id_Compra = $id_Compra;
            $this -> id_Usuario = $id_Usuario;
            $this -> fecha_Compra = $fecha_Compra;
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