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
    
    function mayorEdad($name) {

        // if (($_REQUEST[$name] - date()) >= 18) {
        //     return true;
        // }

        // return false;
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

    function comprobarExpresionRegular($exp, $name) {

        if (preg_match($exp, $_REQUEST[$name])) {
            return true;
        }

        return false;
    }

    
    function validaFormulario(&$errores){

        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
     
        } elseif (!comprobarExpresionRegular($exp_nombre = '/^[a-zA-Z]{3,}/', 'nombre')) {
            $errores['nombre'] = "Mínimo 3 caracteres";
        }

        if (textVacio('apellidos')) {
            $errores['apellidos'] = "Apellidos Vacío";
        }

        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";
        }

        if (textVacio('r_contraseña')) {
            $errores['r_contraseña'] = "Repetir Contraseña Vacía";
        }

        if (textVacio('fecha')) {
            $errores['fecha'] = "Debe seleccionar una fecha";
        }

        if (textVacio('dni')) {
            $errores['dni'] = "DNI Vacío";
        }

        if (textVacio('email')) {
            $errores['email'] = "Correo Electrónico Vacío";
        }

        if (textVacio('fichero')) {
            $errores['fichero'] = "Imagen Vacía";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }
?>