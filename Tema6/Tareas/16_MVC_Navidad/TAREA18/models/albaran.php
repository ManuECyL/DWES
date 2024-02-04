<?php
class Albaran{

    private $id;
    private $cod_producto;
    private $cantidad;
    private $fecha;
    private $usuario;
    private $activo;


    public function __construct($id,$cod_producto,$cantidad,$fecha,$usuario,$activo){
        $this->id=$id;
        $this->cod_producto=$cod_producto;
        $this->cantidad=$cantidad;
        $this->fecha=$fecha;
        $this->usuario=$usuario;
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