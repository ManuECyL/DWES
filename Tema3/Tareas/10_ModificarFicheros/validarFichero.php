<?php
  
    function existeFichero($archivo) {

        if (file_exists($_FILES[$archivo]['name'])) 
           return true;
        
        return false;
    }


    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
        return false;
    }


    function leer() {

        if (isset($_REQUEST['leer'])) 
            return true;
        
        return false;
    }

    
    function escribir() {

        if (isset($_REQUEST['escribir'])) 
            return true;
        
        return false;
    }

?>