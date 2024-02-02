<?php

    if (existe('registrarse')) {
            
        $errores = array();

        if (validarRegistro($errores)) {

            $usuario = new Usuario (
                $_REQUEST['id_Usuario'],
                $_REQUEST['contraseña'],
                $_REQUEST['email'],
                $_REQUEST['fecha_Nacimiento'],
            );

            if (UsuarioDAO::insert($usuario)) {
                $_SESSION['vista'] = VIEW . 'layout.php';
                $sms = "<div class='alert alert-success text-center'><b>Usuario registrado correctamente</b></div>";
            
            } else {
                $errores['registro'] = "<div class='alert alert-danger text-center'><b>No se ha podido registrar</b></div>";
            }
 
        }
    }

?>