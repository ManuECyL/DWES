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


    function rangoNumerico($name) {

        if ($_REQUEST[$name] >= 0 && $_REQUEST[$name] <= 100) {
            return true;
        }

        return false;
    }

    
    function mayorEdad($name) {

        // if (($_REQUEST[$name] - date()) >= 18) {
        //     return true;
        // }

        // return false;
    }


    function generaChecks($name) {

        for ($i = 1; $i <= 6; $i++) { 
            echo "Check" . $i;
        }
    }


    function rangoChecks($name) {

    }


    function imagen($name) {

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

        if (textVacio('numérico')) {
            $errores['numérico'] = "Numérico Vacío";
        }

        if (textVacio('fecha')) {
            $errores['fecha'] = "Debe seleccionar una fecha";
        }

        if (radioVacio('radio')) {
            $errores['radio'] = "Debe seleccionar una opción";
        }

        if (selectVacio('select')) {
            $errores['select'] = "Debe seleccionar una opción";
        }

        if (radioVacio('checks')) {
            $errores['checks'] = "Debe seleccionar al menos una opción y como máximo 3";
        }

        if (textVacio('telefono')) {
            $errores['telefono'] = "Teléfono Vacío";
        }

        if (textVacio('email')) {
            $errores['email'] = "Email Vacío";
        }

        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";
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