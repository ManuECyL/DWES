<?php
    /* Funciones útiles para el uso de toda la aplicación */

    function validarFormulario(&$errores) {

        if (textVacio('username')) {
            $errores['username'] = "Username Vacío";
        } 
        
        if (textVacio('pass')) {
            $errores['pass'] = "Contraseña vacía";
        }

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

    function isAdmin() {
        
        if ($_SESSION['usuario'] -> perfil == 'admin') {
            return true;
        
        } else {
            return false;
        }
    }
?>