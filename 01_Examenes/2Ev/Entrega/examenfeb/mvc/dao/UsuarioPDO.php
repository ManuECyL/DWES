<?php

include_once 'model/Usuario.php';

/* Clase UsuarioPDO
 * Clase que realizará las consultas relacionadas con el usuario
 * @category model
 * @autor Alex Dominguez
 * @version 1.0   
 */

class UsuarioPDO {
 
    
    public static function validarUsuario($username, $password) {
        $usuario = null;
        $consulta = "select * from usuarios where username=? and password=?"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$username, $password]); //Ejecutamos la consulta.

        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $resFetch = $resConsulta->fetchObject();
      

            $usuario = new Usuario($resFetch->id_usuario, $resFetch->username, $resFetch->password, $resFetch->tipo);
        }
        return $usuario;
    }

 



}
