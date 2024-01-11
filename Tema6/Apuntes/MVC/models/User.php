<?php

    class User {
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $fechaUltimaConexion;
        private $perfil; // Rol

        function __construct($codUsuario, $password, $descUsuario, $fechaUltimaConexion, $perfil) {
            $this -> codUsuario = $codUsuario;
            $this -> password = $password;
            $this -> descUsuario = $descUsuario;
            $this -> fechaUltimaConexion = $fechaUltimaConexion;
            $this -> perfil = $perfil;
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

        // To String para mostrar el resultado
        public function __toString() {
            return $this -> cif .":". $this -> nombre .":". $this -> localidad;
        }
    }
?>