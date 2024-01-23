<?php

    class Usuario {
        private $idUsuario;
        private $contraseña;
        private $email;
        private $fecha_Nacimiento;
        private $rol;

        function __construct($idUsuario, $contraseña, $email, $fecha_Nacimiento, $rol = 'cliente') {
            $this -> idUsuario = $idUsuario;
            $this -> contraseña = $contraseña;
            $this -> email = $email;
            $this -> fecha_Nacimiento = $fecha_Nacimiento;
            $this -> rol = $rol;
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