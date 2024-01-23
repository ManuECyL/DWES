<?php
    /* Funciones útiles para el uso de toda la aplicación */

    function validarFormulario(&$errores) {

        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
        } 
        
        if (textVacio('pass')) {
            $errores['pass'] = "Contraseña vacía";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }

    function validarFormularioR(&$errores) {

        if (textVacio('cod')) {
            $errores['cod'] = "CodUsuario Vacío";
        } 

        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
        } 
        
        if (textVacio('pass1')) {
            $errores['pass1'] = "Contraseña vacía";
        }

        if (textVacio('pass2')) {
            $errores['pass2'] = "Contraseña vacía";
        }

        passIgual($_REQUEST['pass1'], $_REQUEST['pass2']);
  
        if (count($errores) == 0) {
            return true;
        }

        return false;
    }

    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
        return false;
    }

    function errores($errores, $name) {

        if (isset($errores[$name])) 
            echo $errores[$name];
    }

    function validado() {
        
        if (isset($_SESSION['usuario'])) {
            return true;    
        }
        
        return false;
    }

    function passIgual($pass1, $pass2, &$errores) {

        if ($pass1 !== $pass2) {
            $errores['igual'] = "Las contraseñas no coinciden";
            return false;
        }

        return true;
    }

?>