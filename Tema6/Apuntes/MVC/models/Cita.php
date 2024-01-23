<?php

    class Cita {
        private $id;
        private $especialista;
        private $motivo;
        private $fecha;
        private $activo; 
        private $paciente;

        // Los valores que tienen valores por defecto en la BBDD deberían ir al final, en este caso 'activo'
        function __construct($id, $especialista, $motivo, $fecha, $activo, $paciente) {
            $this -> id = $id;
            $this -> especialista = $especialista;
            $this -> motivo = $motivo;
            $this -> fecha = $fecha;
            $this -> paciente = $paciente;
            $this -> activo = $activo;
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