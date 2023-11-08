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

        if (isset($_REQUEST['leer']) && !existeFichero('fichero')) {
            $errores['leer'] = "El fichero no existe";
        
        } elseif (isset($_REQUEST['leer']) && existeFichero('fichero')) {

            if (!$fp = fopen('fichero', 'r')) {
                $errores['leer'] = "Ha habido un problema al abrir el fichero";
                
            } else {
                $leido = fread($fp, filesize('fichero'));
                echo "<br>" . $leido;
    
                // Cerramos el fichero
                fclose($fp);
            }            
        } 
    }

    
    function escribir() {

        if (isset($_REQUEST['escribir']) && !existeFichero('fichero')) {

        
        } elseif (isset($_REQUEST['escribir']) && existeFichero('fichero')) {

            if (!$fp = fopen('fichero', 'w')) {
                $errores['leer'] = "Ha habido un problema al abrir el fichero";
                
            } else {
                $leido = fread($fp, filesize('fichero'));
                echo "<br>" . $leido;
    
                // Cerramos el fichero
                fclose($fp);
            }            
        }
    }
?>