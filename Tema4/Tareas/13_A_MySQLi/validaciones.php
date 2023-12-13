<?php

    function enviado() {

        if (isset($_REQUEST['crear']) || isset($_REQUEST['leer']) || isset($_REQUEST['insertar'])) 
            return true;

        return false;
    }
    
    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }


    function comprobarBD($con, $name) {

        // Consulta para obtener la lista de bases de datos
        $consultaBD = $con -> query('show databases');

        // Comprobar si la base de datos existe
        while ($array = $consultaBD -> fetch_assoc()) {

            if ($array['Database'] == $name) {
                return true;
            }
        }

        return false;
    }
?>