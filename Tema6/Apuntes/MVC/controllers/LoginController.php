<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (isset($_REQUEST['Login_IniciarSesion'])) {

        $errores = array();

        // Comprobar si nombre y contraseña no están vacios
        if (validarFormulario($errores)) {
            
            // Validado el usuario en la bbdd
            $usuario = UserDAO::validarUser($_REQUEST['nombre'], $_REQUEST['pass']);

            // Iniciar una sesión que nosotros validamos
            if ($usuario != null) {

                // Actualizamos la ultima fecha de conexion con el formato correcto para la bbdd
                $usuario -> fechaUltimaConexion = date('Y-m-d');

                // Guardamos esta nueva fecha en la bbdd
                UserDAO::update($usuario);

                $_SESSION['usuario'] = $usuario;
                
                // Redirigimos al home, pero con modificaciones
                $_SESSION['vista'] = VIEW . 'home.php';
    
                // No creamos un home Controller, aunque se podría. Para ello cerramos el controlador de Login que se encuentra en este momento
                unset($_SESSION['controller']); 
            
            } else {
                $errores['validado']  = "No existe el usuario y contraseña";
            }

        
        } else {

        }
    
    } else if (isset($_REQUEST['Login_Registro'])) {
        
        $_SESSION['vista'] = VIEW . 'registro.php';

    } 
    
    if (isset($_REQUEST['Login_GuardaRegistro'])) {

        $errores = array();

        // Comprobar si nombre y contraseña no están vacios
        if (validarFormularioR($errores)) {
            
            $usuario = new User(
                $_REQUEST['cod'],
                $_REQUEST['nombre'],
                $_REQUEST['pass1'],
                date('Y-m-d')
            );

            if (UserDAO::insert($usuario)) {
                // Mandarlo a la vista
                $_SESSION['vista'] = VIEW . 'login.php';
                $sms = "Se ha registrado con éxito";
            
            } else {
                $errores['registrar']  = "No se ha podido registrar";
            }
        }
    }

?>