<?php

    // Login
    
    // Funcionara llamando a una función para comprobar si está validado
    if (!validado()) {

        $_SESSION['vista'] = VIEW . 'login.php';
        $_SESSION['controller'] = CONTROLLER . 'LoginController.php';
    
    } else {

        if (isset($_REQUEST['User_editar'])) {
            $_SESSION['vista'] = VIEW . 'editarUser.php';
        
        } else if (isset($_REQUEST['User_CambiaContraseña'])) {
            $_SESSION['vista'] = VIEW . 'editarPassUser.php';
        
        } else if (isset($_REQUEST['User_Guardar'])) {
            $usuario = $_SESSION['usuario'];

            if (!textVacio('nombre')) {
                $usuario -> descUsuario = $_REQUEST['nombre'];
                
                if (UserDAO::update($usuario)) {
                    $sms = "Se ha cambiado el nombre correctamente";
                    // Guardamos en la variable $usuario, el nuevo valor de la sesión con los datos modificados
                    $_SESSION['usuario'] = $usuario;
                    // Después del update volvemos a la vista de verUsuario
                    $_SESSION['vista'] = VIEW . 'verUsuario.php';
                
                } else {
                    $errores['update'] = "No se ha podido modificar el usuario";
                }
            
            } else {
                $errores['nombre'] = "No puede estar vacío";
            }

        } else if (isset($_REQUEST['User_GuardarContraseña'])) {
            $usuario = $_SESSION['usuario'];

            if (!textVacio('pass1') && !textVacio('pass2') && passIgual($_REQUEST['pass1'], $_REQUEST['pass2'], $errores)) {
                $usuario -> password = $_REQUEST['pass1'];

                if (UserDAO::cambioContraseña($_REQUEST['pass1'], $usuario -> codUsuario)) {
                    $sms = "Se ha cambiado la contraseña correctamente";
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['vista'] = VIEW . 'verUsuario.php';
                
                } else {
                    $errores['update'] = "No se ha podido modificar la contraseña";
                }
            }
        }
    }

?>