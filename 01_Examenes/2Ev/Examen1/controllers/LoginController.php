<?php

    // Comprobar si se ha pulsado el botón de iniciar sesión
    if (isset($_REQUEST['Login_IniciarSesion'])) {

        $errores = array();

        // Comprobar si nombre y contraseña no están vacios
        if (validarFormulario($errores)) {
            
            // Validado el usuario en la bbdd
            $usuario = UsuarioDAO::validarUser($_REQUEST['username'], $_REQUEST['pass']);

            // Iniciar una sesión que nosotros validamos
            if ($usuario != null) {

                // Guardamos la sesión en la variable usuario
                $_SESSION['usuario'] = $usuario;

                // Si el usuario ha marcado el checkbox de recuerdame, guardamos la cookie
                if (isset($_REQUEST['recuerdame'])) {
                    // Guardamos la cookie con el nombre de usuario y la duración de un año
                    setcookie('usuario', $usuario -> username, time() + 60 * 60 * 24 * 365);
                
                } else {

                    if (isset($_COOKIE['usuario'])) {
                        // Desactivamos la cookie con el nombre de usuario
                        unset($_COOKIE['usuario']);
                        // Borramos la cookie con el nombre de usuario y la duración de un año
                        setcookie('usuario', $usuario -> username, time() - 1);
                    }
                }
                
                // Si el usuario es administrador, lo redirigimos a la página de admin
                if ($usuario -> tipo == 'admin') {
                    $_SESSION['vista'] = VIEW . 'admin.php';

                } else {
                    // Si el usuario no es administrador, lo redirigimos a la página de usuario
                    $_SESSION['vista'] = VIEW . 'user.php';
                }

    
                // No creamos un home Controller, aunque se podría. Para ello cerramos el controlador de Login que se encuentra en este momento
                unset($_SESSION['controller']); 
            
            } else {
                $errores['validado']  = "No existe el usuario y contraseña";
            }
        } 
    }
?>