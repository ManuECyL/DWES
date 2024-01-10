<?php

    class EmpresaM {

        // Propiedad estática -> No muestra el valor porque pertenece a la clase
        public static $cont = 0;

        private $cif;
        private $nombre;
        private $localidad;

        // Método estático (static)
        static function saluda() {
            // Llama a la función saluda1 internamente. Se cambia por $this
            self::saluda1();
            return "Hola, soy EmpresaM";
        }


        static function saluda1() {
            echo "Hola, soy EmpresaM estatica";
        }

        // Si pasamos parámetros al constructor, por obligación al crear el objeto debemos dar valor a estos parámetros
        function __construct($cif, $nombre, $localidad){
            
            // Llama a la propiedad de la clase $cont y incrementa el valor cada vez que se crea una
            self::$cont ++;

            $this -> cif = $cif;
            $this -> nombre = $nombre;
            $this -> localidad = $localidad;
        }


        // Es una variable de variables, por eso en el return se pone el $ a la varible att
        public function __get($att) {

            // Si la clase contiene el atributo realiza el get
            if (property_exists(__CLASS__, $att)) {
                return $this -> $att;
            
            } else {
                echo "No existe el att (atributo)";
            }

        }


        // Para el __set se pasa el atributo y el valor que se quiere estableces
        public function __set($att, $val) {

            // Si la clase contiene el atributo realiza el set
            if (property_exists(__CLASS__, $att)) {
                $this -> $att = $val;
            
            } else {
                echo "No existe el att (atributo)";
            }
        }


        public function __toString() {
            
            return $this -> cif .":". $this -> nombre .":". $this -> localidad;
        }
    }

?>