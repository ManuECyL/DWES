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


    // Botón Cerrar Sesión
    function cerrado() {

        if (isset($_REQUEST['cerrar'])) 
            return true;
        
        return false;
    }


    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
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