<?php
    
    function enviado() {

        if (isset($_REQUEST['enviar'])) 
            return true;
        
        return false;
    }


    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

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


    function errores($errores, $name) {

        if (isset($errores[$name])) 
            echo $errores[$name];
    }


    function recuerda($name) {

        if (existe($name) && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];
        } 
    }


    function validarRegistro(&$errores){

        // USUARIO
        if (textVacio('id_Usuario')) {
            $errores['id_Usuario'] = "Usuario Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]\w{4,}$/', 'id_Usuario')) {
            $errores['id_Usuario'] = "Mínimo 4 caracteres";
        }

        // CONTRASEÑA
        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";

        } elseif (strlen($_REQUEST['contraseña']) < 8) {
            $errores['contraseña'] = "La contraseña debe tener mínimo 8 caracteres";

        } elseif (!comprobarExpresionRegular($exp_contraseña = '/(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*\d+)/', 'contraseña')) {
            $errores['contraseña'] = "Al menos 1 Mayúscula, 1 minúscula y 1 número";
        }

        // REPETIR CONTRASEÑA
        if (textVacio('passRepetida')) {
            $errores['passRepetida'] = "Repetir Contraseña Vacía";
        
        } elseif (strcmp($_REQUEST['contraseña'], $_REQUEST['passRepetida']) != 0) {
            $errores['passRepetida'] = "Las contraseñas no coinciden";
        }

        // EMAIL
        if (textVacio('email')) {
            $errores['email'] = "Correo Electrónico Vacío";

        } elseif (!comprobarExpresionRegular($exp_email = '/^\w+\@\w+\.\w{2,}$/', 'email')) {
            $errores['email'] = "Formato de email incorrecto";
        
        }

        // FECHA
        if (textVacio('fecha_Nacimiento')) {
            $errores['fecha_Nacimiento'] = "Debe seleccionar una fecha";
        
        } elseif (!comprobarExpresionRegular($exp_fecha = '/^\d{2}\-\d{2}\-\d{4}$/', 'fecha_Nacimiento')) {
            $errores['fecha_Nacimiento'] = "Formato de fecha incorrecto: dd-mm-yyyy";
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    // Botón Cerrar Sesión
    function cerrado() {

        if (isset($_REQUEST['cerrarSesion'])) {
            return true;
            header('Location: ./index.php');
        }
        
        return false;
    }

    // Comprobar si la sesión está iniciada
    function sesionIniciada() {

        if (!isset($_SESSION['usuario'])) {

            $_SESSION['error'] = "No tiene sesión iniciada.";
    
            header('Location: ./login.php');
            exit;
        }
    }


    // Comprobar si tiene permiso para ver la página($url)
    function permisosPagina($url) {

        if (!in_array($url, $_SESSION['usuario']['paginas'])) {
            
            $_SESSION['error'] = "No tiene permiso para ir a la página: " . $url;
    
            header('Location: ./homeUser.php');
            exit;
        }
    }
?>