<?php

     class Usuario {
        private $id;
        private $username;
        private $password;
        private $tipo;
    
        public function __construct($id,$username, $password, $tipo) {
            $this->id =$id;
            $this->username = $username;
            $this->password = sha1($password); // Se cifra la contraseña usando SHA1
            $this->tipo = $tipo;
        }

        
    public function __get($att){
        return $this->$att;
    }

    public function __set($att,$value){
         $this->$att =$value;
    }


}
