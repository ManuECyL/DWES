<?php

    class Usuario {
        private $id_usuario;
        private $username;
        private $password;
        private $tipo;

        function __construct($id_usuario, $username, $password, $tipo) {
            $this -> id_usuario = $id_usuario;
            $this -> username = $username;
            $this -> password = $password;
            $this -> tipo = $tipo;
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