<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {

        $errores = array();

        if (validarFormularioInicioSesion($errores)) {

            $usuario = UsuarioDAO::validarUser($_REQUEST['user'], $_REQUEST['pass']);

            if ($usuario != null) {

                $_SESSION['usuario'] = $usuario;
                // $_SESSION['vista'] = VIEW . 'layout.php';
                unset($_SESSION['controller']);

            } else {
                $_SESSION['errorInicioSesion'] = "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
            }
        } 
        
    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    } 
?>