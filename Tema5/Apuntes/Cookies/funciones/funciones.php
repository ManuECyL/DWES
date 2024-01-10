<?php

    function insertarCookie($id) {

        // Si no existe alguno
        if (!isset($_COOKIE['id'])) {

            // Crear cookie con nombre id, guarde el id de la URL, se borre en 24h, se vea desde todo el dominio
            setcookie('id[1]', $id, time()+(3600*24), "/");
        
        // Si existe
        } else {

            if (in_array($id, $_COOKIE['id'])) {
                // Buscar si existe el mismo
                if ($id == $_COOKIE['id'][2]) {
                    setcookie('id[2]', $_COOKIE['id'][1], time()+(3600*24), "/");
                    setcookie('id[1]', $id, time()+(3600*24), "/");
    
                } elseif ($id == $_COOKIE['id'][3]) {
                    setcookie('id[3]', $_COOKIE['id'][2], time()+(3600*24), "/");
                    setcookie('id[2]', $_COOKIE['id'][1], time()+(3600*24), "/");
                    setcookie('id[1]', $id, time()+(3600*24), "/");
                }
                                   
            // Si no existe el mismo    
            } else {
                // Insertar el primero
                if (isset($_COOKIE['id'][2])) {
                    setcookie("id[3]", $_COOKIE['id'][2], time() + (3600 * 24), "/");
                    setcookie("id[2]", $_COOKIE['id'][1], time() + (3600 * 24), "/");
                    setcookie("id[1]", $id, time() + (3600 * 24), "/");
                }

            }
        }
    }
?>

