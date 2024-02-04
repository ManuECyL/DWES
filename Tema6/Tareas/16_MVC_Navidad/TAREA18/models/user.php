<?php
class User{
    private $user;
    private $pass;
    private $email;

    private $fecha_nac;
    private $rol; //Puede ser usuario, administrador o invitado
    private $activo; 

    public function __construct($user,$pass,$email,$fecha_nac,$rol,$activo){
        $this->user=$user;
        $this->pass=$pass;
        $this->email=$email;
        $this->fecha_nac=$fecha_nac;
        $this->rol=$rol;
        $this->activo=$activo;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function __set($atributo,$valor){
        if(property_exists(__CLASS__,$atributo)) //Comprueba si existe el atributo
        $this->$atributo=$valor;
         else echo "No existe el atributo $atributo";
    
    }
}



?>