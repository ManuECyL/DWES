<?php

if (isset($_REQUEST['Login_IniciarSesion'])) {
    $errores = array();
    if (validarFormulario($errores)) {
        $usuario = UserDAO::validarUsuario($_REQUEST['nombre'], $_REQUEST['pass']);
        if ($usuario != null) {
            // crear cookie que recuerde el user 
            if (isset($_REQUEST['Login_RecordarUser'])) {
                setcookie("usuario", $_REQUEST['nombre'], time() + 3600 * 10);
            }
            // crear sessión y redirigirlo al juego
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'juego.php';
            $_SESSION['controller'] = CON . 'JuegoController.php';
        } else {
            $errores['validado'] = "No existe el usuario y contraseña";
        }
    }
}

?>