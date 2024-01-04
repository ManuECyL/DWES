<?php
    session_start();

    require('./funciones/validaciones.php');
    require('./funciones/conexionBD.php');

    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
        
        $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);

        if ($usuario) {
            
            $_SESSION['usuario'] = $usuario;
            header('Location: ./homeUser.php');
        
        } else {
            echo "No existe usuario o contraseña";
        }
    }

?>