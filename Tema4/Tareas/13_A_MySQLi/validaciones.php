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

        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];

        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }


    function validaFormulario(&$errores){

        // ID
            if (textVacio('id')) {
                $errores['id'] = "id Vacío";
         
            } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}$/', 'nombre')) {
                $errores['id'] = "Mínimo 3 caracteres";
            }
    
        // NOMBRE    
            if (textVacio('nombre')) {
                $errores['nombre'] = "Nombre Vacío";
            
            } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/', 'apellidos')) {
                $errores['nombre'] = "Mínimo 3 caracteres en cada apellido y un espacio para separar";
            }
    
        // COMPAÑIA
            if (textVacio('nombre')) {
                $errores['nombre'] = "Nombre Vacío";
            
            } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/', 'apellidos')) {
                $errores['nombre'] = "Mínimo 3 caracteres en cada apellido y un espacio para separar";
            }
            
    
        // STOCK
            if (textVacio('nombre')) {
                $errores['nombre'] = "Nombre Vacío";
            
            } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/', 'apellidos')) {
                $errores['nombre'] = "Mínimo 3 caracteres en cada apellido y un espacio para separar";
            }
    
        // PRECIO  
            if (textVacio('nombre')) {
                $errores['nombre'] = "Nombre Vacío";
            
            } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/', 'apellidos')) {
                $errores['nombre'] = "Mínimo 3 caracteres en cada apellido y un espacio para separar";
            }
    
        // FECHA LANZAMIENTO
            if (textVacio('fecha')) {
                $errores['fecha'] = "Debe seleccionar una fecha";
            
            } elseif (!comprobarExpresionRegular($exp_fecha = '/^\d{2}\-\d{2}\-\d{4}$/', 'fecha')) {
                $errores['fecha'] = "Formato de fecha incorrecto: dd-mm-yyyy";
            
            } elseif (!mayorEdad('fecha')) {
                $errores['fecha'] = "No es mayor de edad";
            }
   
            return false;
        }
?>