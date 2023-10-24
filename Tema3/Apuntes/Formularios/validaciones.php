<?php
    
    function enviado() {

        if (isset($_REQUEST['enviar'])) 
            return true;
        
        return false;
    }


    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
        return false;
    }


    function radioVacio($name) {

        if (!isset($_REQUEST[$name])) 
            return true;
    
        return false;
    }


    function selectVacio($name) {

        if (isset($_REQUEST[$name]) && $_REQUEST[$name] != 0) 
            return false;
    
        return true;
    }


    function errores($errores, $name) {

        if (isset($errores[$name])) 
            echo $errores[$name];
    }


    function recuerda($name) {

        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];

        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }


    function recuerdaRadio($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
            echo 'checked';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }


    function recuerdaCheck($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && in_array($value, $_REQUEST[$name])) {
            echo 'checked';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }  


    function recuerdaSelect($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
            echo 'selected';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }

    
    function validaFormulario(&$errores){

        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
        }

        if (textVacio('apellido')) {
            $errores['apellido'] = "Apellido Vacío";
        }

        if (radioVacio('genero')) {
            $errores['genero'] = "Debe seleccionar un género";
        }

        if (radioVacio('aficion')) {
            $errores['aficion'] = "Debe seleccionar al menos una afición";
        }

        if (textVacio('fecha_n')) {
            $errores['fecha_n'] = "Debe seleccionar una fecha";
        }

        if (selectVacio('equipos')) {
            $errores['equipos'] = "Debe seleccionar un equipo";
        }

        if (textVacio('fichero')) {
            $errores['fichero'] = "Fichero Vacío";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }
?>