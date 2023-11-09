<?php
  
    function enviado() {

        if (isset($_REQUEST['leer']) || isset($_REQUEST['editar']) || isset($_REQUEST['volver']) || isset($_REQUEST['guardar'])) 
            return true;

        return false;
    }

    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
        return false;
    }

    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }

    function existeFichero($archivo) {

        if (file_exists($_REQUEST[$archivo])) 
           return true;
        
        return false;
    }   
?>