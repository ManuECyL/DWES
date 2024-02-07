<?php

include_once 'model/Usuario.php';

/* Clase UsuarioPDO
 * Clase que realizará las consultas relacionadas con el usuario
 * @category model
 * @autor Alex Dominguez
 * @version 1.0   
 */

class PalabraDAO {
 
    
    public static function findRandom() {
        return file_get_contents(URI_API."palabra");
    }

    public static function findRandomN($num) {
        return file_get_contents(URI_API."palabra?min=".$num);
    }

 



}
