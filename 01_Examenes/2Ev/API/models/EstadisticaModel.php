<?php

    class Estadistica {
        private $id_estadistica;
        private $id_usuario;
        private $id_palabra;
        private $resultado;
        private $intentos;
        private $fecha;


        function __construct($id_estadistica, $id_usuario, $id_palabra, $resultado, $intentos, $fecha) {
            $this -> id_estadistica = $id_estadistica;
            $this -> id_usuario = $id_usuario;
            $this -> id_palabra = $id_palabra;
            $this -> resultado = $resultado;
            $this -> intentos = $intentos;
            $this -> fecha = $fecha;
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