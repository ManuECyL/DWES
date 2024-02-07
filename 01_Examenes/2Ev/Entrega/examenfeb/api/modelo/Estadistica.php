<?php

/**
 * Class Departamento
 *
 * Clase que contiene los metodos para crear consultar y modificar cualquier atributo de un departamento
 *
 * PHP version 7.0
 *
 * @category Departamento
 * @package  Departamento
 * @source Departamento.php
 * @since Versión 1.1 Añadidos getters y setters
 * @copyright 12-02-2020
 * @author Versión 1.1 Alex Dominguez Dominguez
 * @version Versión 1.1 Añadidos getters y setters
 
 */

 class Estadistica {
    private $id;
    private $id_usuario;
    private $id_palabra;
    private $resultado;
    private $intentos;
    private $fecha;

    public function __construct($id_usuario, $id_palabra, $resultado, $intentos) {
        $this->id_usuario = $id_usuario;
        $this->id_palabra = $id_palabra;
        $this->resultado = $resultado;
        $this->intentos = $intentos;
        $this->fecha = date("Y-m-d H:i:s"); // Fecha actual
    }

 
    public function __get($att){
        return $this->$att;
    }

    public function __set($att,$value){
         $this->$att =$value;
    }

}
