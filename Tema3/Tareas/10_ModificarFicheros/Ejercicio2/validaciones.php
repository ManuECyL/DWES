<?php

    function enviado() {

        if (isset($_REQUEST['editar']) || isset($_REQUEST['volver']) || isset($_REQUEST['guardar']) || isset($_REQUEST['añadir'])) 
            return true;

        return false;
    }
    
    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }
?>