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

    function comprobarExpresionRegular($exp, $name) {

        if (preg_match($exp, $_REQUEST[$name])) 
            return true;
        
        return false;
    }
    
    function mayorEdad($name) {

        if (($_REQUEST[$name])) {
            return true;
        }

        return false;
    }


    // function imagen($name) {

    // }


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

    
    function validaFormulario(&$errores){

    // NOMBRE
        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
     
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}$/', 'nombre')) {
            $errores['nombre'] = "Mínimo 3 caracteres";
        }

    // APELLIDOS    
        if (textVacio('apellidos')) {
            $errores['apellidos'] = "Apellidos Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/', 'apellidos')) {
            $errores['apellidos'] = "Mínimo 3 caracteres en cada apellido y un espacio para separar";
        }

    // CONTRASEÑA
        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";

        } elseif (!comprobarExpresionRegular($exp_contraseña = '/^(?=\w*[a-z])(?=\w*[A-Z])(?=\w*\d)[a-zA-Z\d]$/', 'contraseña')) {
            $errores['contraseña'] = "Al menos 1 Mayúscula, 1 minúscula y 1 número";
        }

        if (textVacio('r_contraseña')) {
            $errores['r_contraseña'] = "Repetir Contraseña Vacía";
        
        } elseif (!strcmp($_REQUEST['contraseña'], $_REQUEST['r_contraseña'])) {
            $errores['r_contraseña'] = "Las contraseñas no coinciden";
        }

    // FECHA
        if (textVacio('fecha')) {
            $errores['fecha'] = "Debe seleccionar una fecha";
        
        } elseif (!comprobarExpresionRegular($exp_fecha = '/^\d{2}\-\d{2}\-\d{4}$/', 'contraseña')) {
            $errores['contraseña'] = "Formato de fecha incorrecto: dd-mm-yyyy";
        
        } elseif (!mayorEdad('fecha'))

    // DNI  
        if (textVacio('dni')) {
            $errores['dni'] = "DNI Vacío";
        }

    // EMAIL
        if (textVacio('email')) {
            $errores['email'] = "Correo Electrónico Vacío";
        }

    // FICHERO IMAGEN
        if (textVacio('fichero')) {
            $errores['fichero'] = "Imagen Vacía";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function mostrarTodo() {
        // NOMBRE
        echo "El nombre es: " .$_REQUEST['nombre'];

        // APELLIDO
        echo "<br>Los apellidos son: " .$_REQUEST['apellido'];

        // CONTRASEÑA
        echo "<br>La contraseña es: " .$_REQUEST['contraseña'];

        // FECHA
        echo "<br>La fecha es: " .$_REQUEST['fecha'];
                
        // DNI
        echo "<br>El DNI es: " .$_REQUEST['dni'];

        // EMAIL
        echo "<br>El email es: " .$_REQUEST['email'];

        // FICHERO IMAGEN
        //  echo $_REQUEST['imagen'];
    }
?>